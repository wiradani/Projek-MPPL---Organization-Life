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
Route::resource('/', 'WelcomeController');
Route::resource('/kabinet', 'ListKabinet');
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');
Route::get('/register', function () {
    return view('register');
});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::delete('/kabinet/{kabinet}/delete', 'ListKabinet@delete')->name('delete.kabinet');

Route::view('/tambahEvent', 'partials.formEvent');
