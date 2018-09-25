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

Route::resource('vianda', 'ViandaController');
Route::resource('viandas', 'ViandaController');

Route::resource('persona', 'PersonaController');
Route::resource('personas', 'PersonaController');

Route::resource('pedido', 'PedidoController');
Route::resource('pedidos', 'PedidoController');






Route::get('/usuarios', 'UserController@index');



//Route::get('/vianda','ViandaController@index');