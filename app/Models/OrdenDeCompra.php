<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenDeCompra extends Model
{
    protected $fillable = [
        'producto_id',
        'proveedor_id',
        'cantidad',
        'fecha_orden',
        'fecha_entrega_estimada',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
}

