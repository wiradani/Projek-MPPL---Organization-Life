<?php
header('Access-Control-Allow-Origin: *');
header( 'Access-Control-Allow-Headers: Authorization, Content-Type' );
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::auth();
Route::group(array('before' => 'auth'), function() 
{
    Route::get('user/logout', array(
        'uses' => 'UserController@doLogout',
    ));

    Route::get('/', function() {
        return Redirect::to('dashboard');
    });

    Route::get('dashboard',  array(
        'uses' => 'DashboardController@showIndex',
    ));

    // More Routes

});

Route::resource('/', 'WelcomeController');
Route::resource('/kabinet', 'ListKabinet');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@create')->name('register');
Route::get('/register', function () {
    return view('register');
});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::delete('/kabinet/{kabinet}/delete', 'ListKabinet@delete')->name('delete.kabinet');
Route::delete('/viewEvent/{id}/delete', 'EventController@delete')->name('event.delete');
Route::get('/tambahEvent', 'EventController@view_tambah')->name('tambahKabinet');
Route::get('/tabelEvent', 'EventController@index')->name('tabelEvent');
Route::post('/tambahEvent', 'EventController@store')->name('create_event');
Route::get('/viewEvent/{id}', 'EventController@edit')->name('edit_status');
Route::post('/confirmation/{id}', 'EventController@edit_update')->name('edit_status_update');
Route::get('/tambahKabinet', 'CabinetController@view')->name('tambahKabinet');
Route::post('/tambahKabinet', 'CabinetController@store')->name('create_kabinet');
Route::get('/viewEvent', 'EventController@view')->name('event.view');

Route::get('/tambahOrganisasi', 'OrganizationController@view')->name('tambahOrganisasi');
Route::post('/tambahOrganisasi', 'OrganizationController@store')->name('create_organisasi');

Route::get('/tambahReward', 'RewardController@tambah_view_reward')->name('tambahReward');
Route::post('/tambahReward', 'RewardController@create')->name('create_reward');

Route::get('/viewUserEvent', 'EventController@view_user_event')->name('event_user.view');


Route::get('/tambahDivisi', 'DivisionController@view_tambah')->name('tambahDivisi');
Route::post('/tambahDivisi', 'DivisionController@store')->name('create_division');