<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetRecommendation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'home_space',
        'daily_time',
        'personality',
        'has_children',
        'has_allergy',
        'experience_level',
        'budget_level',
        'preferred_activity',
        'recommended_pet',
        'recommendation_reason',
        'answers_vector',
    ];

    protected $casts = [
        'answers_vector' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}