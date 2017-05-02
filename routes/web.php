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


Route::get('/',[
    'uses' => 'PizzaController@index']);

Route::get('/makepizza', [
    'uses' => 'PizzaController@createForm'
]);
Route::post('/makepizza', [
    'as' => 'make-pizza',
    'uses' => 'PizzaController@create'
]);
