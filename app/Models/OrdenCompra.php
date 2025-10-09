<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrdenCompra extends Model
{
    use HasFactory;

    protected $table = 'orden_compras';
    protected $primaryKey = 'id';

    protected $fillable = [

        'proveedores_id',
        'numero_orden',
        'estado',
        'registrado_por',
        'total'


    ];

    protected $guarded = [

        'id',
        'created_at',
        'updated_at',

    ];


    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedores_id');
    }

    public function pagoCompras()
    {
        return $this->hasMany(PagoCompra::class, 'ordenCompras_id');
    }

    public function detalleCompras()
    {
        return $this->hasMany(DetalleCompra::class, 'ordenCompras_id');
    }
}