<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetalleFactura extends Model
{
    use HasFactory;

    protected $table = 'detalle_facturas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'producto_id',
        'factura_id',
        'cantidad',
        'sub_total',
        'registrado_por'
    ];

    protected $guarded = [

        'id',
        'created_at',
        'updated_at'


    ];

    public function factura()
    {
        return $this->belongsTo(Factura::class, 'factura_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}