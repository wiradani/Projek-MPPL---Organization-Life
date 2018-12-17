<?php

use Illuminate\Http\Request;

header('Access-Control-Allow-Origin: *');
header( 'Access-Control-Allow-Headers: Authorization, Content-Type' );
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

Route::get('organizations', array('middleware' => 'cors', 'uses' => 'OrganizationController@index'));
Route::get('organizations/{id}', array('middleware' => 'cors', 'uses' => 'OrganizationController@show'));
Route::post('organizations', array('middleware' => 'cors', 'uses' => 'OrganizationController@store'));
Route::put('organizations/{id}', array('middleware' => 'cors', 'uses' => 'OrganizationController@update'));
Route::delete('organizations/{id}', array('middleware' => 'cors', 'uses' => 'OrganizationController@delete'));

Route::get('cabinets', array('middleware' => 'cors', 'uses' => 'CabinetController@index'));
Route::get('cabinets/{id}', array('middleware' => 'cors', 'uses' => 'CabinetController@show'));
Route::post('cabinets', array('middleware' => 'cors', 'uses' => 'CabinetController@store'));
Route::put('cabinets/{id}', array('middleware' => 'cors', 'uses' => 'CabinetController@update'));
Route::delete('cabinets/{id}',array('middleware' => 'cors', 'uses' =>  'CabinetController@delete'));

Route::get('contacts', array('middleware' => 'cors', 'uses' => 'ContactController@index'));
Route::get('contacts/{id}', array('middleware' => 'cors', 'uses' => 'ContactController@show'));
Route::post('contacts', array('middleware' => 'cors', 'uses' => 'ContactController@store'));
Route::put('contacts/{id}', array('middleware' => 'cors', 'uses' => 'ContactController@update'));
Route::delete('contacts/{id}',array('middleware' => 'cors', 'uses' =>  'ContactController@delete'));

Route::get('divisions', array('middleware' => 'cors', 'uses' => 'DivisionController@index'));
Route::get('divisions/{id}', array('middleware' => 'cors', 'uses' => 'DivisionController@show'));
Route::post('divisions', array('middleware' => 'cors', 'uses' => 'DivisionController@store'));
Route::put('divisions/{id}', array('middleware' => 'cors', 'uses' => 'DivisionController@update'));
Route::delete('divisions/{id}',array('middleware' => 'cors', 'uses' =>  'DivisionController@delete'));

Route::get('events', array('middleware' => 'cors', 'uses' => 'EventController@index'));
Route::get('events/{id}', array('middleware' => 'cors', 'uses' => 'EventController@show'));
Route::post('events', array('middleware' => 'cors', 'uses' => 'EventController@store'));
Route::put('events/{id}', array('middleware' => 'cors', 'uses' => 'EventController@update'));
Route::delete('events/{id}', array('middleware' => 'cors', 'uses' => 'EventController@delete'));

Route::get('reward',array('middleware' => 'cors', 'uses' =>  'RewardController@index'));
Route::get('reward/{id}', array('middleware' => 'cors', 'uses' => 'RewardController@show'));
Route::post('reward', array('middleware' => 'cors', 'uses' => 'rewardController@store'));
Route::put('reward/{id}', array('middleware' => 'cors', 'uses' => 'RewardController@update'));
Route::delete('reward/{id}',array('middleware' => 'cors', 'uses' =>  'RewardController@delete'));

Route::get('role', array('middleware' => 'cors', 'uses' => 'RoleController@index'));
Route::get('role/{id}', array('middleware' => 'cors', 'uses' => 'RoleController@show'));
Route::post('role', array('middleware' => 'cors', 'uses' => 'RoleController@store'));
Route::put('role/{id}', array('middleware' => 'cors', 'uses' => 'RoleController@update'));
Route::delete('role/{id}', array('middleware' => 'cors', 'uses' => 'RoleController@delete'));

Route::get('user',array('middleware' => 'cors', 'uses' =>  'UserController@index'));
Route::get('user/{id}',array('middleware' => 'cors', 'uses' =>  'UserController@show'));
Route::post('user',array('middleware' => 'cors', 'uses' =>  'UserController@store'));
Route::put('user/{id}',array('middleware' => 'cors', 'uses' =>  'UserController@update'));
Route::delete('user/{id}',array('middleware' => 'cors', 'uses' =>  'UserController@delete'));

Route::get('userGetInfo/{id}', array('middleware' => 'cors', 'uses' => 'UserController@userGetInfo'));
Route::get('getKabinet/{id}', array('middleware' => 'cors', 'uses' => 'OrganizationController@getKabinet'));
Route::get('getDivisi/{id}', array('middleware' => 'cors', 'uses' => 'CabinetController@getDivisi'));

Route::post('login', array('middleware' => 'cors', 'uses' => 'UserController@login'));
Route::post('joinEvent', array('middleware' => 'cors', 'uses' => 'UserController@joinEvent'));
Route::get('userEventHistory/{id}', array('middleware' => 'cors', 'uses' => 'EventController@userEventHistory'));