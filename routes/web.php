<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PedidoController;
use App\Http\Controllers\Admin\ProdutoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Show Register Page & Login Page
Route::get('/', [AuthController::class,'login'])->name('admin.login')->middleware('guest');

Route::middleware(['auth' ,'auth.admin'])->prefix('admin')->group(function(){
    Route::get('/',[DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/produtos',[ProdutoController::class,'index'])->name('admin.produtos');
    Route::get('/produtos/editar/{produto}',[ProdutoController::class,'update'])->name('admin.produtos.editar');
    Route::get('/produtos/novo',[ProdutoController::class,'create'])->name('admin.produtos.criar');
    Route::get('/clientes',[ClienteController::class,'index'])->name('admin.clientes');
    Route::post('/logout', [AuthController::class,'logout'])->name('admin.logout');
});

