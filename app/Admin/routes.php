<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');

    //rutas que añadimos para el admin
    $router->resource('marcas', MarcaController::class); //cuidado, no importes la clase o explota, ya está precargado
    $router->resource('modelos', ModeloController::class);

    //config vehiculos
    $router->resource('vehiculos', VehiculoController::class);
    $router->resource('estado-vehiculos', EstadoVehiculoController::class);

    $router->resource('combustibles', CombustibleController::class);
    $router->resource('transmisions', TransmisionController::class);

    //clientes (users)
    $router->resource('users', UserController::class);

    $router->resource('reservas', ReservaController::class);
    $router->resource('vehiculo_historicos', VehiculoHistoricoController::class);

    //oficinas
    $router->resource('oficinas', OficinaController::class);

});
