<?php

use Illuminate\Http\Request;
Use App\Divisi;
 
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('divisi', 'DivisiController@index');
Route::get('divisi/{divisi}', 'DivisiController@show');
Route::post('divisi', 'DivisiController@store');
Route::put('divisi/{divisi}', 'DivisiController@update');
Route::delete('divisi/{divisi}', 'DivisiController@delete');

Route::get('organisasi', 'OrganizationController@index');
Route::get('organisasi/{organisasi}', 'OrganizationController@show');
Route::post('organisasi', 'OrganizationController@store');
Route::put('organiasi/{organisasi}', 'OrganizationController@update');
Route::delete('organisasi/{organisasi}', 'OrganizationController@delete');

Route::get('kabinet', 'cabinetController@index');
Route::get('kabinet/{kabinet}', 'CabinetController@show');
Route::post('kabinet', 'CabinetController@store');
Route::put('kabinet/{kabinet}', 'CabinetController@update');
Route::delete('kabinet/{kabinet}', 'CabinetController@delete');

Route::get('event', 'EventController@index');
Route::get('event/{event}', 'EventController@show');
Route::post('event', 'EventController@store');
Route::put('event/{event}', 'EventController@update');
Route::delete('event/{event}', 'EventController@delete');

Route::get('reward', 'RewardController@index');
Route::get('reward/{reward}', 'RewardController@show');
Route::post('reward', 'RewardController@store');
Route::put('reward/{reward}', 'RewardController@update');
Route::delete('reward/{reward}', 'RewardController@delete');

Route::get('divisi', 'DivisionController@index');
Route::get('divisi/{divsi}', 'DivisionController@show');
Route::post('divisi', 'DivisonController@store');
Route::put('divisi/{divisi}', 'DivisionController@update');
Route::delete('divisi/{divsi}', 'DivisonController@delete');

Route::get('kontak', 'ContactController@index');
Route::get('kontak/{kontak}', 'ContactController@show');
Route::post('kontak', 'ContactController@store');
Route::put('kontak/{kontak}', 'ContactController@update');
Route::delete('kontak/{kontak}', 'ContactController@delete');

Route::get('role', 'RoleController@index');
Route::get('role/{role}', 'RoleController@show');
Route::post('role', 'RoleController@store');
Route::put('role/{role}', 'RoleController@update');
Route::delete('role/{role}', 'RoleController@delete');