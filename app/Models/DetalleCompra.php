<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetalleCompra extends Model
{


    use HasFactory;

    protected $table = 'detalle_compras';
    protected $primaryKey = 'id';

    protected $fillable = [

        'producto_id',
        'ordenCompras_id',
        'cantidad',
        'sub_total',
        'iva',
        'registrado_por'

    ];

    protected $guarded = [

        'id',
        'created_at',
        'updated_at'


    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function ordenCompra()
    {
        return $this->belongsTo(OrdenCompra::class, 'ordenCompras_id');
    }
}