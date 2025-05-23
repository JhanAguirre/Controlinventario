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

    public function category()
{
    return $this->belongsTo(Category::class); // Asumiendo que la FK es category_id
}

public function brand()
{
    return $this->belongsTo(Brand::class); // Asumiendo que la FK es brand_id
}


    public function bodegas()
    {
        return $this->belongsToMany(Bodega::class, 'bodega_producto')
                    ->withPivot('cantidad_en_bodega');
    }
}