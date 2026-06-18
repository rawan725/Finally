<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'business_name',
        'type',
        'phone',
        'whatsapp_number',
        'email',
        'address',
        'description',
        'status',
        'total_earnings',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
