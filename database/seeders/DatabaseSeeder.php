<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Menggunakan User::firstOrCreate untuk 'test@example.com' dari versi Anda
        // Ini lebih baik karena mencegah duplikasi jika seeder dijalankan berkali-kali.
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'), // Menggunakan password 'password' dari versi Anda
                'email_verified_at' => now(),
            ]
        );

        // Menambahkan user 'Admin' dari versi teman Anda
        // Menggunakan firstOrCreate juga untuk mencegah duplikasi
        User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('admin'), // Menggunakan password 'admin' dari versi teman Anda
            ]
        );

        // Menggabungkan semua panggilan seeder dari kedua versi
        $this->call([
            KegiatanSeeder::class, // Dari versi Anda
            KomunitasSeeder::class, // Dari versi teman Anda
            LabScheduleSeeder::class, // Dari versi teman Anda
            ResearchCategorySeeder::class, // Dari versi teman Anda
            ResearchSeeder::class, // Dari versi teman Anda
        ]);
    }
}