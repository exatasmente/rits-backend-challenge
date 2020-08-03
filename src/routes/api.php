<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Cliente\ClienteController;
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
    Route::get('cliente/{cliente}', [ClienteController::class,'show']);
    Route::apiResource('cliente/{cliente}/pedido', 'Pedido\PedidoController',['except' => 'update','edit']);
    Route::apiResource('/produtos', 'Produto\ProdutoController',['only' => ['index','show']]);
    Route::apiResource('/produtos/search', 'Produto\ProdutoSearchController',['only' => ['index']]);

    Route::fallback(function(){
        return response()->json([
            'message' => 'invalid endpoint'], 404);
    });

});

