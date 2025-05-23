<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id', // ¡Añadido!
        'status',
        'total',
        'shipping_address',
        'city',
        'state',
        'zip_code',
        'country',
        'phone_number',
        'notes',
    ];

    /**
     * Get the user that owns the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The products that belong to the order.
     */
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'order_product')
                    ->withPivot('quantity', 'price_at_purchase')
                    ->withTimestamps();
    }
}
