<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;

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

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/depositar/{id}', [App\Http\Controllers\CuentaController::class,'depositar']);
    Route::post('/transferencia', [App\Http\Controllers\CuentaController::class,'transferencia']);
    Route::post('/retiro', [App\Http\Controllers\CuentaController::class,'retiro']);
});