<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'price',
        'description',
        'image',
    ];

    public function cartItems()
    {
        return $this->morphMany(CartItem::class, 'cartable');
    }

    public function orderItems()
    {
        return $this->morphMany(OrderItem::class, 'orderable');
    }
}