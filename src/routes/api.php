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
Route::middleware('auth.api')->namespace('Api')->group(function(){
    Route::apiResource('signup','Auth\RegisterController');
    Route::prefix('cliente/')->group(function(){
        Route::resource('/', 'ClienteController',['except' => 'destroy','store']);
        Route::resource('/pedido', 'PedidoController');
    });
});
Route::fallback(function(){
    return response()->json([
        'message' => 'invalid endpoint'], 404);
});
