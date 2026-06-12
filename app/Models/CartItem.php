<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = [
        'user_id',
        'cartable_id',
        'cartable_type',
        'quantity',
        'price',
    ];

    public function cartable()
    {
        return $this->morphTo();
    }
}