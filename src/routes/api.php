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
    Route::post('signup',[RegisterController::class,'store']);

    Route::middleware('auth.api')->group(function(){
        Route::prefix('cliente/')->group(function(){
            Route::apiResource('/', 'Cliente\ClienteController',['except' => ['destroy','store']]);
            Route::apiResource('/pedido', 'Pedido\PedidoController',['except' => 'update']);
        });
        Route::apiResource('/produtos', 'Produto\ProdutoController',['except' => ['update','destroy','store']]);
        Route::apiResource('/search/produtos', 'Produto\ProdutoSearchController',['except' => ['update','destroy','store']]);
    });
    Route::fallback(function(){
        return response()->json([
            'message' => 'invalid endpoint'], 404);
    });

});

