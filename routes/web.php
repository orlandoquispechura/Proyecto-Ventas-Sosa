<?php

use App\Http\Controllers\ArticuloController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;

use App\Models\Proveedor;

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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    return view('home.welcome');
})->name('home');

Route::resource('categorias', CategoriaController::class)->names('categorias');
Route::resource('proveedors', ProveedorController::class)->names('proveedors');
Route::resource('articulos', ArticuloController::class)->names('articulos');
Route::resource('clientes', ClienteController::class)->names('clientes');
