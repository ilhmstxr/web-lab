<?php

namespace Database\Seeders;

use App\Models\ResearchTopic;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'), 
                'email_verified_at' => now(),
            ]
        );

        User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('admin'), 
            ]
        );

        $this->call([
            KegiatanSeeder::class, 
            KomunitasSeeder::class, 
            LabScheduleSeeder::class, 
            ResearchCategorySeeder::class, 
            ResearchSeeder::class, 
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'), // Use a secure password
        ]);
        
        $this->call([
            KomunitasSeeder::class,
            LabScheduleSeeder::class,
            ResearchCategorySeeder::class,
            ResearchTopicSeeder::class,
            ResearchSeeder::class,
        ]);
    }
}