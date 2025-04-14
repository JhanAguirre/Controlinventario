<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenDeCompra extends Model
{
    protected $table = 'ordenes_de_compra'; // Nombre de la tabla en la base de datos

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

