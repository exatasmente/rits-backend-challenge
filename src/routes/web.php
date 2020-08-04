<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\PedidoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Show Register Page & Login Page
Route::livewire('/login', 'auth.login')->name('login')->middleware('guest');
Route::middleware(['auth' ,'auth.admin'])->prefix('admin')->group(function(){
    Route::livewire('/','admin.dashboard')->name('admin.dashboard');

    Route::namespace('Admin')->group(function(){
        Route::resource('clientes', 'ClienteController');
        Route::resource('pedidos', 'PedidoController');
        Route::resource('produtos', 'ProdutoController');
    });

    Route::get('/logout', function(){
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    });
});

