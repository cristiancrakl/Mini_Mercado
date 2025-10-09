<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

    use HasFactory;

    protected $table = 'clientes';
    protected $primaryKey = 'id';

    protected $fillable = [

        'nombre',
        'tipo_documento',
        'numero_documento',
        'direccion',
        'telefono',
        'email',
        'estado',
        'registrado_por'

    ];

    protected $guarded = [

        'id',
        'created_at',
        'updated_at',

    ];

    public function facturas()
    {
        return $this->hasMany(Factura::class, 'cliente_id');
    }
}