<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetMedicalProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pet_name',
        'pet_type',
        'age',
        'gender',
        'health_status',
        'vaccinations',
        'allergies',
        'medications',
        'medical_notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
