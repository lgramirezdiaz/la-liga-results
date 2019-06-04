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
Route::resource('posiciones', 'PosicionesController');
Route::resource('laliga', 'HomeController');

// ==> Enruto métodos especificos. 
// ==> Esta ruta no retorna vista, unicamente un json plano.
Route::get('partidos/all', 'PartidosController@AllMatches');

// ==> Estas rutas si retornan vistas
Route::get('equipos/partidos/{name}', [
    'as' => 'equipos.match', 'uses' => 'EquiposController@showMatches'
]);

Route::get('partidos/jornada/{id?}', [
    'as' => 'partidos.jornada', 'uses' => 'PartidosController@Jornada'
]);

Route::get('partidos/encuentro_mapa/{id?}', [
    'as' => 'partidos.encuentro_mapa', 'uses' => 'PartidosController@encuentro_mapa'
]);



