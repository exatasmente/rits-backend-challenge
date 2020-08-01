<?php

use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;

Route::resource('pedidos', 'PedidoController');
Route::resource('produtos', 'ProdutoController');
Route::resource('clientes', 'ClienteController');
