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

Route::group(['prefix' => 'pizza'], function () {

    Route::get('/', ['uses' => 'PizzaController@index']);

    Route::get('/make', ['uses' => 'PizzaController@create']);

    Route::post('/make', ['as' => 'store-pizza', 'uses' => 'PizzaController@store']);

    Route::group(['prefix' => '{id}'], function () {

        Route::get('/', ['uses' => 'PizzaController@show']);

        Route::get('/edit', ['uses' => 'PizzaController@edit']);

        Route::post('/edit', ['as' => 'update-pizza', 'uses' => 'PizzaController@update']);

    });
});
