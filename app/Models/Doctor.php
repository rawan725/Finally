<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'specialty',
        'experience_years',
        'consultation_price',
        'bio',
        'image',
        'is_available',
    ];

    public function bookings()
    {
        return $this->hasMany(DoctorBooking::class);
    }
}
