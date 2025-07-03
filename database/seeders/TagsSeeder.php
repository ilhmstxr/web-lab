<?php

namespace Database\Seeders;

use App\Models\Tags;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Daftar tag yang akan diisi
        $tags = [
            ['name' => 'Kategori', 'icon' => 'tag', 'default_color' => 'bg-blue-500'],
            ['name' => 'Teknologi', 'icon' => 'code', 'default_color' => 'bg-slate-800'],
            ['name' => 'Tahun', 'icon' => 'calendar', 'default_color' => 'bg-green-500'],
            ['name' => 'Software', 'icon' => 'tool', 'default_color' => 'bg-purple-500'],
        ];

        Tags::insert($tags);
    }
}
