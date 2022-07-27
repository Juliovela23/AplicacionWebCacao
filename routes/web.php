<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/pedido', function () {
    return view('Pedidos');
});
Route::get('/producto', function () {
    return view('productos');
});

Route::get('/pedidoHecho', function () {
    return view('realizado');
});


