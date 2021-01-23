<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::get('/contribuyente', function () {
    return view('home');
})->middleware('auth');

Route::get('/buscar', function () {
    return view('home');
})->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/guardar', [App\Http\Controllers\ContController::class, 'store'])->name('home');
Route::get('/cont/{comun}/{tipo}', [App\Http\Controllers\ContController::class, 'show'])->name('home');
Route::post('/modifica/{comun}', [App\Http\Controllers\ContController::class, 'update'])->name('home');
