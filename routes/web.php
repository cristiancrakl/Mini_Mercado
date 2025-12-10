<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\MetodoPagoController;
use App\Http\Controllers\OrdenCompraController;
use Illuminate\Support\Facades\DB;




Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return 'bienvenido a nosotros';
});

Auth::routes();

Route::resource('clientes', ClienteController::class);
Route::resource('productos', ProductoController::class);
Route::resource('proveedores', ProveedorController::class);
Route::resource('facturas', FacturaController::class);
Route::resource('metodoPagos', MetodoPagoController::class);
Route::resource('ordenCompras', OrdenCompraController::class);

Route::get('cambioestadoCliente', [ClienteController::class, 'cambioestadoCliente'])->name('cambioestadoCliente');
Route::post('cambioestadoProducto', [ProductoController::class, 'cambioestadoProducto'])->name('cambioestadoProducto');
Route::post('cambioestadoFactura', [FacturaController::class, 'cambioestadoFactura'])->name('cambioestadoFactura');
Route::post('cambioestadoProveedor', [ProveedorController::class, 'cambioestadoProveedor'])->name('cambioestadoProveedor');
Route::post('cambioestadoMetodoPago', [MetodoPagoController::class, 'cambioestadoMetodoPago'])->name('cambioestadoMetodoPago');
Route::post('cambioestadoOrdenCompra', [OrdenCompraController::class, 'cambioestadoOrdenCompra'])->name('cambioestadoOrdenCompra');

Route::get('/probar-404', function () {
    abort(404);
});

// Ruta para simular un error 500 (Internal Server Error)
Route::get('/probar-500', function () {
    abort(500);
});

// Ruta para simular un QueryException (error de base de datos)
Route::get('/probar-db', function () {
    // Ejecuta una consulta inválida para provocar una QueryException
    DB::select('select * from tabla_que_no_existe');
});

// Ruta para lanzar una excepción genérica (500)
Route::get('/probar-exception', function () {
    throw new \Exception('Excepción de prueba');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');