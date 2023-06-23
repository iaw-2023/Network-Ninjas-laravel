<?php

use App\Http\Controllers\Rest\V1\ProductoController;
use App\Http\Controllers\Rest\V1\ClienteController;
use App\Http\Controllers\Rest\V1\PedidoController;
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

Route::group(['prefix'=>'v1','namespace'=>'App\Http\Controllers\Rest\V1'], function(){
    Route::apiResource('productos',ProductoController::class);
    Route::apiresource('categorias',CategoriumController::class);
    Route::apiresource('pedidos',PedidoController::class);
    Route::apiresource('detalles',DetallesPedidoController::class);
    Route::apiresource('clientes',ClienteController::class);
    Route::get('/productos/search/{nombre}', [ProductoController::class, 'searchByName']);
    Route::get('/productos/search/categoria/{id_categoria}', [ProductoController::class, 'searchByCategory']);
    Route::get('/clientes/search/{nombre}', [ClienteController::class, 'searchByName']);
    Route::get('/pedidos/search/{id}', [PedidoController::class, 'searchByClientId']);
});



