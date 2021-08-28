<?php

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
Route::get('/consulta', [App\Http\Controllers\CuentaController::class,'getConsulta']);
*/

Route::apiResource('cuentas', App\Http\Controllers\CuentaController::class);
Route::post('/depositar/{id}', [App\Http\Controllers\CuentaController::class,'depositar']);
Route::post('/transferencia', [App\Http\Controllers\CuentaController::class,'transferencia']);
Route::post('/retiro', [App\Http\Controllers\CuentaController::class,'retiro']);
