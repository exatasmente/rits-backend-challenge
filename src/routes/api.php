<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::namespace('Api')->group(function(){
    Route::get('/login',[LoginController::class,'show']);
    Route::post('/login',[LoginController::class,'login']);
    Route::apiResource('signup','Auth\RegisterController');



    Route::middleware('auth:api')->group(function () {
        Route::resource('clientes', 'ClienteController');
        Route::resource('pedidos', 'PedidoController');
        Route::resource('produtos', 'ProdutoController');
    });
});
