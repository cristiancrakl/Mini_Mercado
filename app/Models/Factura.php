<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Factura extends Model
{
    use HasFactory;

    protected $table = 'facturas';
    protected $primaryKey = 'id';

    protected $fillable = [

        'cliente_id',
        'total',
        'iva',
        'saldo_pendiente',
        'tipo_pago',
        'descuento',
        'registrado_por',
        'estado'

    ];


    protected $guarded = [

        'id',
        'created_at',
        'updated_at',

    ];


    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function detalleFacturas()
    {
        return $this->hasMany(DetalleFactura::class, 'factura_id');
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'facturas_id');
    }
}