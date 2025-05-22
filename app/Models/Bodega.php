<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Bodega extends Model
{
    use HasFactory;

    protected $table = 'bodegas';
    
    protected $fillable = [
        'nombre',
        'ubicacion',
        'descripcion',
        'capacidad',
        'responsable',
        'telefono_contacto',
        'estado'
    ];
    

    public function productos(): BelongsToMany
    {
        return $this->belongsToMany(Producto::class)
                    ->withPivot('cantidad_en_bodega')
                    ->withTimestamps(); //  Si quieres timestamps en la tabla pivote
    }
}