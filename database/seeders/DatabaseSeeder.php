<?php

namespace Database\Seeders;

use App\Models\ResearchTopic;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
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
            TagsSeeder::class,
            PortofolioSeeder::class,
        ]);
    }
}
