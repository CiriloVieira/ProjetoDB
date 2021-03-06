<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(Auth::check()) {
        return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
    }
    return redirect('login');
});

Route::resource('conta', \App\Http\Controllers\ClientController::class);
Route::patch("conta/{id}", [\App\Http\Controllers\ClientController::class, 'update']);
Route::delete("conta/{id}", [\App\Http\Controllers\ClientController::class, 'destroy']);

Route::resource('database', \App\Http\Controllers\DatabaseController::class);
Route::patch("database/{id}", [\App\Http\Controllers\ClientController::class, 'update']);
Route::delete("database/{id}", [\App\Http\Controllers\ClientController::class, 'destroy']);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');




