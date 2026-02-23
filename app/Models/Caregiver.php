<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caregiver extends Model
{
    protected $fillable = [
        'user_id',
        'specialization',
        'hourly_rate',
        'availability',
        'years_experience',
        'certifications',
        'average_rating',
        'total_reviews',
    ];

    protected $casts = [
        'availability' => 'array',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'caregiver_id');
    }
}
