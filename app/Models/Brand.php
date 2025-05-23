<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description'];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'brand_id'); // Asegúrate que 'brand_id' es la FK en Producto
    }
}