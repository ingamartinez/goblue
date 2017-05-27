<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', ['as'=>'inicio', 'uses' => 'InicioController@getInicio']);
    Route::get('logout', 'AuthController@getLogout');


    Route::resource('fordis','FordisController');
    Route::resource('dms','DMSController');
    Route::resource('goblue','GoBlueController');


});


Route::group(['middleware' => 'guest'], function () {

    Route::get('login', 'AuthController@getLogin');
    Route::post('login', 'AuthController@postLogin');

});








