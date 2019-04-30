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

Route::get('/', function () {
    return view('welcome');
});

// ==> Utilizo resource para que el me realice los métodos básicos CRUD. 

Route::resource('partidos', 'PartidosController');
Route::resource('equipos', 'EquiposController');

// ==> Enruto métodos especificos. 

Route::get('partidos/{id}', 'EquiposController@showMatches');