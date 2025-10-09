<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

    use HasFactory;

    protected $table = 'productos';
    protected $primaryKey = 'id';

    protected $fillable = [

        'nombre',
        'precio_compra',
        'precio_venta',
        'descripcion',
        'unidad_medida',
        'stock',
        'stock_minimo',
        'imagen',
        'estado',
        'registrado_por'

    ];

    protected $guarded = [

        'id',
        'created_at',
        'updated_at'



    ];

    public function detalleFacturas()
    {
        return $this->hasMany(DetalleFactura::class, 'producto_id');
    }

    public function detalleCompras()
    {
        return $this->hasMany(DetalleCompra::class, 'producto_id');
    }
}