<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pago extends Model
{


    use HasFactory;

    protected $table = 'pagos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'facturas_id',
        'metodoPagos_id',
        'monto',
        'registrado_por',
        'estado',
        'referencia_transaccion',
        'observaciones'
    ];

    protected $guarded = [

        'id',
        'created_at',
        'updated_at',

    ];

    public function factura()
    {
        return $this->belongsTo(Factura::class, 'facturas_id');
    }

    public function metodoPago()
    {
        return $this->belongsTo(MetodoPago::class, 'metodoPagos_id');
    }
}