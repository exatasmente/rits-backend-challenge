<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\PedidoController;
use Illuminate\Support\Facades\Route;

Route::get('login',[LoginController::class,'show']);
Route::post('login',[LoginController::class,'login']);

Route::prefix('admin')->namespace('Admin')->group(function(){
    Route::resource('clientes', 'ClienteController');
    Route::resource('pedidos', 'PedidoController');
    Route::resource('produtos', 'ProdutoController');

});

