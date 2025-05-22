<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReporteInventario extends Model
{
    protected $table = 'reportes_inventario'; // Puedes nombrar la tabla como desees
    protected $fillable = ['nombre', 'descripcion', 'tipo', 'filtros']; // Ejemplo de campos
    protected $casts = [
        'filtros' => 'array', // Si almacenas filtros como un array JSON
    ];
}