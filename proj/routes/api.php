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
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/client', [\App\Http\Controllers\ClientController::class, 'index']);
Route::post('/client', [\App\Http\Controllers\ClientController::class, 'store']);

Route::post('database', [\App\Http\Controllers\DatabaseController::class, 'store']);


