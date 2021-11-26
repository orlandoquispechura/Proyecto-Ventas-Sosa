<?php

use App\Http\Controllers\ArticuloController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaController;
use App\Models\Articulo;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;


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

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home.welcome');


// Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
//     return view('home.welcome');
// })->name('home');

// Route::resource('users', UserController::class)->middleware('can:users.index')->names('admin.users');
Route::resource('users', UserController::class)->names('admin.users');

Route::resource('roles', RoleController::class)->names('admin.roles');


Route::get('ventas/reporte_dia', [ReportController::class, 'reporte_dia'])->name('reporte.dia');
Route::get('ventas/reporte_fecha', [ReportController::class, 'reporte_fecha'])->name('reporte.fecha');

Route::post('ventas/resultado_reporte', [ReportController::class, 'resultado_reporte'])->name('resultado.reporte');


Route::resource('empresa', EmpresaController::class)->names('admin.empresa')->only([
    'index', 'update'
]);


Route::resource('categorias', CategoriaController::class)->except('show')->names('admin.categorias');
Route::resource('clientes', ClienteController::class)->names('admin.clientes');
Route::resource('articulos', ArticuloController::class)->names('admin.articulos');
Route::resource('proveedors', ProveedorController::class)->names('admin.proveedors');


Route::resource('compras', CompraController::class)->names('admin.compras')->except([
    'edit', 'update', 'destroy'
]);
Route::resource('ventas', VentaController::class)->names('admin.ventas')->except([
    'edit', 'update', 'destroy'
]);



Route::get('compras/pdf/{compra}', [CompraController::class, 'pdf'])->name('compras.pdf');
Route::get('ventas/pdf/{venta}', [VentaController::class, 'pdf'])->name('ventas.pdf');


// Route::get('compras/upload/{compra}', [CompraController::class, 'upload'])->name('upload.compras');

Route::get('cambio_de_estado/articulos/{articulo}', [ArticuloController::class, 'cambio_de_estado'])->name('cambio.estado.articulos');
Route::get('cambio_de_estado/compras/{compra}', [CompraController::class, 'cambio_de_estado'])->name('cambio.estado.compras');
Route::get('cambio_de_estado/ventas/{venta}', [VentaController::class, 'cambio_de_estado'])->name('cambio.estado.ventas');


Route::get('get_products_by_barcode', [ArticuloController::class, 'get_products_by_barcode'])->name('get_products_by_barcode');
Route::get('get_products_by_id', [ArticuloController::class, 'get_products_by_id'])->name('get_products_by_id');
Route::get('print_barcode', [ArticuloController::class, 'print_barcode'])->name('print_barcode');


Route::get('/barcode', function () {
    $articulo = Articulo::get();
    return view('admin.articulo.barcode', compact('articulos'));
});
