<?php

namespace Database\Seeders;

use App\Models\ResearchCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResearchCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $researchCategories = [
            ['name' => 'Skripsi', 'description' => 'Kumpulan skripsi mahasiswa', 'icon' => 'fa-solid fa-graduation-cap'],
            ['name' => 'Penelitian', 'description' => 'Kumpulan penelitian dosen', 'icon' => 'fa-solid fa-flask'],
            ['name' => 'Pengabdian Masyarakat', 'description' => 'Kegiatan pengabdian kepada masyarakat', 'icon' => 'fa-solid fa-hands-helping'],
            ['name' => 'Kompetisi', 'description' => 'Kumpulan kompetisi yang diikuti oleh mahasiswa', 'icon' => 'fa-solid fa-trophy'],
        ];

        ResearchCategory::insert($researchCategories);
    }
}
