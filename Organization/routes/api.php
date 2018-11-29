<?php

use Illuminate\Http\Request;

 
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

Route::get('organizations', 'OrganizationController@index');
Route::get('organizations/{id}', 'OrganizationController@show');
Route::post('organizations', 'OrganizationController@store');
Route::put('organizations/{id}', 'OrganizationController@update');
Route::delete('organizations/{id}', 'OrganizationController@delete');

Route::get('cabinets', 'CabinetController@index');
Route::get('cabinets/{id}', 'CabinetController@show');
Route::post('cabinets', 'CabinetController@store');
Route::put('cabinets/{id}', 'CabinetController@update');
Route::delete('cabinets/{id}', 'CabinetController@delete');

Route::get('contacts', 'ContactController@index');
Route::get('contacts/{id}', 'ContactController@show');
Route::post('contacts', 'ContactController@store');
Route::put('contacts/{id}', 'ContactController@update');
Route::delete('contacts/{id}', 'ContactController@delete');

Route::get('divisions', 'DivisionController@index');
Route::get('divisions/{id}', 'DivisionController@show');
Route::post('divisions', 'DivisionController@store');
Route::put('divisions/{id}', 'DivisionController@update');
Route::delete('divisions/{id}', 'DivisionController@delete');

Route::get('events', 'EventController@index');
Route::get('events/{id}', 'EventController@show');
Route::post('events', 'EventController@store');
Route::put('events/{id}', 'EventController@update');
Route::delete('events/{id}', 'EventController@delete');

Route::get('reward', 'RewardController@index');
Route::get('reward/{id}', 'RewardController@show');
Route::post('reward', 'rewardController@store');
Route::put('reward/{id}', 'RewardController@update');
Route::delete('reward/{id}', 'RewardController@delete');

Route::get('role', 'RoleController@index');
Route::get('role/{id}', 'RoleController@show');
Route::post('role', 'RoleController@store');
Route::put('role/{id}', 'RoleController@update');
Route::delete('role/{id}', 'RoleController@delete');

Route::get('user', 'UserController@index');
Route::get('user/{id}', 'UserController@show');
Route::post('user', 'UserController@store');
Route::put('user/{id}', 'UserController@update');
Route::delete('user/{id}', 'UserController@delete');

Route::get('userGetOrganisasi/{id}', 'UserController@userGetOrganisasi');
Route::get('userGetKabinet/{id}', 'UserController@userGetCabinet');
Route::get('userGetDivisi/{id}', 'UserController@userGetDivision');