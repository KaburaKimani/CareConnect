<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Caregiver;
use Illuminate\Support\Facades\Hash;

class CaregiverSeeder extends Seeder
{
    public function run()
    {
        // Create a sample caregiver user
        $user = User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@careconnect.com',
            'password' => Hash::make('password123'),
            'role' => 'caregiver',
            'phone' => '+1234567890',
            'bio' => 'Experienced elderly care specialist with 10 years of experience.',
        ]);

        // Create caregiver profile
        Caregiver::create([
            'user_id' => $user->id,
            'specialization' => 'Elderly Care',
            'hourly_rate' => 25.00,
            'years_experience' => 10,
            'certifications' => 'Certified Nursing Assistant (CNA)',
            'average_rating' => 4.8,
            'total_reviews' => 45,
        ]);
    }
}