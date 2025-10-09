<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Factura;
use App\Models\DetalleFactura;
use App\Models\MetodoPago;
use App\Models\Pago;
use App\Models\OrdenCompra;
use App\Models\DetalleCompra;
use App\Models\PagoCompra;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create();
        Cliente::factory(1)->create();
        Producto::factory(1)->create();
        Proveedor::factory(1)->create();
        MetodoPago::factory(1)->create();
        OrdenCompra::factory(1)->create();
        DetalleCompra::factory(1)->create();
        Factura::factory(1)->create();
        DetalleFactura::factory(1)->create();
        Pago::factory(1)->create();
        PagoCompra::factory(1)->create();
    }
}