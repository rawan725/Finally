<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'doctor_id',
        'consultation_type',
        'pet_name',
        'pet_type',
        'problem_title',
        'problem_description',
        'booking_date',
        'booking_time',
        'status',
        'severity_level',
        'case_image',
        'sms_sent',
        'sms_message',
        'sms_sent_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}