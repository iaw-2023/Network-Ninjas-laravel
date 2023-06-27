<?php

use App\Http\Controllers\Api\V1\CategoriumController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});

Route::group(['namespace'=> 'App\Http\Controllers\Api\V1'],function(){
    Route::apiResource('categorias', CategoriumController::class);
    Route::apiResource('detallespedidos', DetallesPedidoController::class);
    Route::apiResource('pedidos', PedidoController::class);
    Route::apiResource('productos', ProductoController::class);
});
