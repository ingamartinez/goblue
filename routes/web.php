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

    Route::resource('logger','LogController');
    Route::get('graficos', ['as'=>'graficos', 'uses' => 'GraficoController@index']);


});


Route::group(['middleware' => 'guest'], function () {

    Route::get('login', 'AuthController@getLogin');
    Route::post('login', 'AuthController@postLogin');

});

//Route::get('prueba',function (){
//    $goblues= \App\Goblue::all();
//
//    $ruta='imagenes/'.$goblue->idpdv.'_fachada_'.$goblue->nombre_punto.'.jpg';
//
//    Image::make('imagenes/'.$goblue->ruta_imagen1)->save($ruta);
//
//
//    Image::make('imagenes/'.$goblue->ruta_imagen1)->resize(100, 50)->save('imagenes/'.$goblue->idpdv.'_fachada_'.$goblue->nombre_punto.'_min.jpg');
//    Image::make('imagenes/'.$goblue->ruta_imagen2)->resize(100, 50)->save('imagenes/'.$goblue->idpdv.'_interior_'.$goblue->nombre_punto.'_min.jpg');
//    Image::make('imagenes/'.$goblue->ruta_imagen3)->resize(100, 50)->save('imagenes/'.$goblue->idpdv.'_panoramica_'.$goblue->nombre_punto.'_min.jpg');
//
//    foreach ($goblues as $goblue){
//        Image::make('imagenes/'.$goblue->ruta_imagen1)->save('imagenes/'.$goblue->idpdv.'_fachada_'.$goblue->nombre_punto.'.jpg');
//        Image::make('imagenes/'.$goblue->ruta_imagen1)->resize(100, 50)->save('imagenes/min/'.$goblue->idpdv.'_fachada_'.$goblue->nombre_punto.'.jpg');
//        $goblue->ruta_imagen1=$goblue->idpdv.'_fachada_'.$goblue->nombre_punto.'.jpg';
//
//        Image::make('imagenes/'.$goblue->ruta_imagen2)->save('imagenes/'.$goblue->idpdv.'_interior_'.$goblue->nombre_punto.'.jpg');
//        Image::make('imagenes/'.$goblue->ruta_imagen2)->resize(100, 50)->save('imagenes/min/'.$goblue->idpdv.'_interior_'.$goblue->nombre_punto.'.jpg');
//        $goblue->ruta_imagen2=$goblue->idpdv.'_interior_'.$goblue->nombre_punto.'.jpg';
//
//        Image::make('imagenes/'.$goblue->ruta_imagen3)->save('imagenes/'.$goblue->idpdv.'_panoramica_'.$goblue->nombre_punto.'.jpg');
//        Image::make('imagenes/'.$goblue->ruta_imagen3)->resize(100, 50)->save('imagenes/min/'.$goblue->idpdv.'_panoramica_'.$goblue->nombre_punto.'.jpg');
//        $goblue->ruta_imagen3=$goblue->idpdv.'_panoramica_'.$goblue->nombre_punto.'.jpg';
//
//        $goblue->save();
//    }
//
//});