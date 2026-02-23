<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'client_id',
        'caregiver_id',
        'date',
        'start_time',
        'end_time',
        'status',
        'notes',
        'scheduled_at',
        'duration_hours',
    ];

    // Relationships
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function caregiver()
    {
        return $this->belongsTo(User::class, 'caregiver_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
