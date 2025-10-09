<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PagoCompra extends Model
{
    use HasFactory;

    protected $table = 'pago_compras';
    protected $primaryKey = 'id';

    protected $fillable = [

        'ordenCompras_id',
        'metodoPagos_id',
        'monto',
        'referencia_transaccion',
        'registrado_por',
        'estado'


    ];

    protected $guarded = [

        'id',
        'created_at',
        'updated_at',

    ];


    public function ordenCompra()
    {
        return $this->belongsTo(OrdenCompra::class, 'ordenCompras_id');
    }

    public function metodoPago()
    {
        return $this->belongsTo(MetodoPago::class, 'metodoPagos_id');
    }
}