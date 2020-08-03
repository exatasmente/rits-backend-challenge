<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\PedidoController;
use Illuminate\Support\Facades\Route;

// Show Register Page & Login Page

Route::get('/login', [LoginController::class,'show'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'authenticate'])->name('authenticate');
Route::middleware(['auth' ,'auth.admin'])->prefix('admin')->namespace('Admin')->group(function(){
    Route::get('/', [DashboardController::class,'index']);
    Route::resource('clientes', 'ClienteController');
    Route::resource('pedidos', 'PedidoController');
    Route::resource('produtos', 'ProdutoController');
    Route::post('/logout', [LoginController::class,'logout']);
});

