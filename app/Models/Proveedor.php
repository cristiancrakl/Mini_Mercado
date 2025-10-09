<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proveedor extends Model
{

    use HasFactory;

    protected $table = 'proveedores';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'numero_documento',
        'tipo_documento',
        'direccion',
        'telefono',
        'email',
        'estado',
        'registrado_por'
    ];

    protected $guarded = [

        'id',
        'created_at',
        'updated_at'

    ];

    public function ordenCompras()
    {
        return $this->hasMany(OrdenCompra::class, 'proveedores_id');
    }
}