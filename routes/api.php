<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Rest\V1\CategoriumController;
use App\Http\Controllers\Rest\V1\PedidoController;
use App\Http\Controllers\Rest\V1\ProductoController;

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
    Route::apiResource('producto',ProductoController::class);
    Route::apiresource('categoria',CategoriumController::class);
    Route::apiresource('pedidos',PedidoController::class);
});



