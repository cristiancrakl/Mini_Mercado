<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MetodoPago extends Model
{
    use HasFactory;

    protected $table = 'metodo_pagos';
    protected $primaryKey = 'id';

    protected $fillable = [

        'nombre',
        'descripcion',
        'registrado_por',
        'estado'

    ];

    protected $guarded = [

        'id',
        'created_at',
        'updated_at',

    ];

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'metodoPagos_id');
    }
    public function pagoCompras()
    {
        return $this->hasMany(PagoCompra::class, 'metodoPagos_id');
    }
}