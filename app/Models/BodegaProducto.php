<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot; // Importa la clase Pivot

class BodegaProducto extends Pivot // Extiende de Pivot, no de Model
{
    use HasFactory;

    // Si tu tabla pivote tiene un nombre diferente a 'bodega_producto',
    // puedes especificarlo aquí:
    // protected $table = 'nombre_de_tu_tabla_pivote';

    // Si no usas los campos 'created_at' y 'updated_at' en tu tabla pivote,
    // puedes establecer public $timestamps = false;
    public $timestamps = true; // Asegúrate de que esto coincida con tu migración

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'producto_id',
        'bodega_id',
        'cantidad_en_bodega',
    ];

    // Opcional: Define las relaciones si necesitas acceder a ellas directamente desde el pivote
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function bodega()
    {
        return $this->belongsTo(Bodega::class);
    }
}