<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description'];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'category_id'); // Asegúrate que 'category_id' es la FK en Producto
    }
}