<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Caregiver;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create a test client
        $client = User::create([
            'name' => 'John Client',
            'email' => 'client@test.com',
            'password' => Hash::make('password'),
            'role' => 'client',
            'phone' => '+1234567890',
        ]);

        // Create caregiver users with profiles
        $caregivers = [
            [
                'name' => 'Jane Smith',
                'email' => 'jane@careconnect.com',
                'specialization' => 'Elderly Care',
                'hourly_rate' => 25.00,
                'years_experience' => 10,
                'certifications' => 'Certified Nursing Assistant (CNA)',
                'bio' => 'Experienced elderly care specialist with a passion for helping seniors live independently.',
            ],
            [
                'name' => 'Michael Johnson',
                'email' => 'michael@careconnect.com',
                'specialization' => 'Dementia Care',
                'hourly_rate' => 30.00,
                'years_experience' => 8,
                'certifications' => 'Dementia Care Certification, CNA',
                'bio' => 'Specialized in dementia and Alzheimer\'s care with gentle and patient approach.',
            ],
            [
                'name' => 'Sarah Williams',
                'email' => 'sarah@careconnect.com',
                'specialization' => 'Physical Therapy',
                'hourly_rate' => 35.00,
                'years_experience' => 12,
                'certifications' => 'Licensed Physical Therapist',
                'bio' => 'Helping seniors regain mobility and independence through personalized therapy.',
            ],
            [
                'name' => 'David Brown',
                'email' => 'david@careconnect.com',
                'specialization' => 'Companion Care',
                'hourly_rate' => 20.00,
                'years_experience' => 5,
                'certifications' => 'CPR Certified',
                'bio' => 'Providing friendly companionship and assistance with daily activities.',
            ],
            [
                'name' => 'Emily Davis',
                'email' => 'emily@careconnect.com',
                'specialization' => 'Post-Surgery Care',
                'hourly_rate' => 28.00,
                'years_experience' => 7,
                'certifications' => 'RN, Post-Op Care Specialist',
                'bio' => 'Registered nurse specializing in post-operative care and recovery.',
            ],
        ];

        foreach ($caregivers as $caregiverData) {
            $user = User::create([
                'name' => $caregiverData['name'],
                'email' => $caregiverData['email'],
                'password' => Hash::make('password'),
                'role' => 'caregiver',
                'phone' => '+1' . rand(1000000000, 9999999999),
                'bio' => $caregiverData['bio'],
            ]);

            Caregiver::create([
                'user_id' => $user->id,
                'specialization' => $caregiverData['specialization'],
                'hourly_rate' => $caregiverData['hourly_rate'],
                'years_experience' => $caregiverData['years_experience'],
                'certifications' => $caregiverData['certifications'],
                'average_rating' => rand(42, 50) / 10, // 4.2 to 5.0
                'total_reviews' => rand(10, 50),
            ]);
        }

        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@careconnect.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        $this->command->info('✅ Sample data seeded successfully!');
        $this->command->info('📧 Test accounts:');
        $this->command->info('   Client: client@test.com / password');
        $this->command->info('   Caregiver: jane@careconnect.com / password');
        $this->command->info('   Admin: admin@careconnect.com / password');
    }
}
