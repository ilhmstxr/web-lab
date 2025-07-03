<?php

namespace Database\Factories;

use App\Models\Kegiatan;
use Illuminate\Database\Eloquent\Factories\Factory;

class KegiatanFactory extends Factory
{
    protected $model = Kegiatan::class;

    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence(4),
            'deskripsi' => $this->faker->paragraph(),
            'kategori' => $this->faker->randomElement(['Workshop', 'Seminar', 'Pelatihan']),
            'tanggal' => $this->faker->date(),
            'tempat' => $this->faker->city(),
            'poster' => null,
        ];
    }
}
