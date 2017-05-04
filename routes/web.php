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

Route::group(['prefix' => 'pizza'], function() {

    Route::get('/',['uses' => 'PizzaController@index']);

    Route::get('/make', ['uses' => 'PizzaController@create']);

    Route::post('/make', ['as' => 'make-pizza','uses' => 'PizzaController@store']);
});
