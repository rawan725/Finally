<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
    protected $fillable = [
        
    'user_id',
    'total_price',
    'status',
    'full_name',
    'phone',
    'city',
    'address',
    'postal_code',
    'payment_method',
    'payment_reference',
];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
{
    return $this->belongsTo(User::class);
}
}