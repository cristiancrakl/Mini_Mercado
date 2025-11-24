<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\MetodoPagoController;
use App\Http\Controllers\OrdenCompraController;


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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
