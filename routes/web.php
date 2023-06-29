<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriumController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth', 'verified')->group(function(){
    Route::resource('producto',ProductoController::class);
    Route::resource('categorium',CategoriumController::class);
    Route::resource('pedido',PedidoController::class);
    Route::resource('detalle',PedidoController::class);
    Route::resource('cliente',ClienteController::class);
});






