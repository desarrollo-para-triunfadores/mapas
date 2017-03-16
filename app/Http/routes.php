<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('/zonas/main');
//});

Route::resource('zonas','Controller_zona');
Route::resource('rutas','Controller_ruta');
Route::resource('preventistas','Controller_preventista');
Route::resource('usuarios','Controller_usuario');
Route::resource('celulares','Controller_celular');
Route::resource('configuraciones','Controller_configuracion');
Route::auth();

Route::get('/', 'HomeController@index');
   Route::PUT('usuarios/actpass/{usuarios}', 'Controller_usuario@actPass');
      Route::PUT('usuarios/actconf/{usuarios}', 'Controller_usuario@actConf');