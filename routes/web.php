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

Route::get('/', 'PortadaController@index');

//auth son las rutas para el control de auth (usuarios)
Auth::routes();

//ruta por defecto cuando el usuario se loguea, lo llamaremos más tarde perfil
Route::get('/home', 'HomeController@index')->name('home');

//rutas de reserva
Route::get('reservar-vehiculo', 'ReservaController@index')->name('reservar-vehiculo');
Route::get('reservar-cliente', 'ReservaController@cliente')->name('reservar-cliente');
Route::get('reservar-resumen', 'ReservaController@resumen')->name('reservar-resumen');
Route::get('reservar-tramitada', 'ReservaController@tramitada')->name('reservar-tramitada');
//guardar reserva
Route::post('reservar/{paso}', 'ReservaController@reserva');
