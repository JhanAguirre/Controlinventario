<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'cantidad_en_stock'
    ];

    public function ordenesCompra()
    {
        return $this->hasMany(OrdenCompra::class);
    }

    public function bodegas()
    {
        return $this->belongsToMany(Bodega::class, 'bodega_producto')
                    ->withPivot('cantidad_en_bodega');
    }
}