<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(array('prefix' => 'api/v1.1'), function () {
    Route::resource('makers', 'MakerController', ['except' => ['create', 'edit']]);

    Route::resource('vehicles', 'VehicleController', ['only' => ['index', 'show']]);

    Route::resource('makers.vehicles', 'MakerVehiclesController', ['except' => ['edit', 'create']]);
});

