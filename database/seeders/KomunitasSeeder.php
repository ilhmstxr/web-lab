<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Komunitas;
use App\Models\KomunitasAnggota;
use App\Models\KomunitasAgenda;

class KomunitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // --- 1. MEMBUAT KOMUNITAS DICRETECH ---
            $dicretech = Komunitas::create([
                'name' => 'Dicretech',
                'tagline' => 'Komunitas untuk inovasi dan kreativitas teknologi',
                //'logo' => 'komunitas-logos/logo-dicretech.png',
                'about' => 'Dicretech adalah singkatan dari \'Digital Creative Technology\', sebuah komunitas yang berfokus pada pengembangan kreativitas dan inovasi di bidang teknologi digital. Kami menjadi wadah bagi mahasiswa untuk belajar, berkolaborasi, dan menciptakan proyek-proyek inovatif, mulai dari pengembangan aplikasi, desain UI/UX, hingga multimedia.',
            ]);

            // Menambahkan anggota untuk Dicretech
            KomunitasAnggota::create([
                'komunitas_id' => $dicretech->id,
                'name' => 'Dr. Agus Purnomo',
                'role' => 'Penanggung Jawab',
                //'photo' => 'anggota-photos/agus.png',
            ]);
            KomunitasAnggota::create([
                'komunitas_id' => $dicretech->id,
                'name' => 'Rian Ardiansyah',
                'role' => 'Ketua',
                //'photo' => 'anggota-photos/rian.jpg',
            ]);
            KomunitasAnggota::create([
                'komunitas_id' => $dicretech->id,
                'name' => 'Citra Kirana',
                'role' => 'Wakil Ketua',
                //'photo' => 'anggota-photos/citra.jpg',
            ]);
            KomunitasAnggota::create([
                'komunitas_id' => $dicretech->id,
                'name' => 'Dewi Lestari',
                'role' => 'Bendahara',
                //'photo' => 'anggota-photos/dewi.jpg',
            ]);
            KomunitasAnggota::create([
                'komunitas_id' => $dicretech->id,
                'name' => 'Ahmad Budi',
                'role' => 'Anggota',
                //'photo' => 'anggota-photos/agus.png',
            ]);
            KomunitasAnggota::create([
                'komunitas_id' => $dicretech->id,
                'name' => 'Eka Sari',
                'role' => 'Anggota',
            ]);
            KomunitasAnggota::create([
                'komunitas_id' => $dicretech->id,
                'name' => 'Fajar Nugraha',
                'role' => 'Anggota',
            ]);
            KomunitasAnggota::create([
                'komunitas_id' => $dicretech->id,
                'name' => 'Gita Amelia',
                'role' => 'Anggota',
            ]);
            KomunitasAnggota::create([
                'komunitas_id' => $dicretech->id,
                'name' => 'Hendra Setiawan',
                'role' => 'Anggota',
            ]);
            KomunitasAnggota::create([
                'komunitas_id' => $dicretech->id,
                'name' => 'Indah Permata',
                'role' => 'Anggota',
            ]);

            // Menambahkan agenda untuk Dicretech
            KomunitasAgenda::create([
                'komunitas_id' => $dicretech->id,
                'title' => 'Workshop UI/UX dengan Figma',
                'schedule' => \Illuminate\Support\Carbon::parse('2025-08-15 10:00:00'),
                'description' => 'Pelatihan intensif merancang antarmuka aplikasi yang menarik dan fungsional.',
            ]);
            KomunitasAgenda::create([
                'komunitas_id' => $dicretech->id,
                'title' => 'Sesi Kolaborasi Proyek',
                'schedule' => \Illuminate\Support\Carbon::parse('2025-08-15 10:00:00'),
                'description' => 'Waktu khusus untuk bekerja sama dalam tim untuk mengembangkan proyek aplikasi mobile.',
            ]);
            KomunitasAgenda::create([
                'komunitas_id' => $dicretech->id,
                'title' => 'Seminar Teknologi Kreati',
                'schedule' => \Illuminate\Support\Carbon::parse('2025-08-15 10:00:00'),
                'description' => 'Mengundang praktisi industri untuk berbagi wawasan tentang tren teknologi terbaru.',
            ]);
            KomunitasAgenda::create([
                'komunitas_id' => $dicretech->id,
                'title' => 'Klinik Koding',
                'schedule' => \Illuminate\Support\Carbon::parse('2025-08-15 10:00:00'),
                'description' => 'Sesi tanya jawab dan pemecahan masalah coding bersama para anggota senior.',
            ]);




            // --- 2. MEMBUAT KOMUNITAS ISCOM ---
            $iscom = Komunitas::create([
                'name' => 'Iscom',
                'tagline' => 'Komunitas untuk pengembangan skill dan kolaborasi',
                //'logo' => 'komunitas-logos/logo-iscom.png',
                'about' => 'Iscom, atau \'Informatics Student Community\', adalah komunitas yang didedikasikan untuk memperdalam pengetahuan dan keterampilan di bidang informatika. Kami mengadakan berbagai kegiatan seperti workshop coding, sesi sharing, dan persiapan kompetisi untuk meningkatkan kemampuan teknis dan non-teknis para anggota.',
            ]);

             // Menambahkan anggota untuk Iscom
            KomunitasAnggota::create([
                'komunitas_id' => $iscom->id,
                'name' => 'Dr. Indah Cahyani',
                'role' => 'Penanggung Jawab',
                //'photo' => 'anggota-photos/indah.jpg',
            ]);
            KomunitasAnggota::create([
                'komunitas_id' => $iscom->id,
                'name' => 'Bayu Wicaksono',
                'role' => 'Ketua',
                //'photo' => 'anggota-photos/bayu.jpg',
            ]);
            KomunitasAnggota::create([
                'komunitas_id' => $iscom->id,
                'name' => 'Anisa Putri',
                'role' => 'Wakil Ketua',
                //'photo' => 'anggota-photos/anisa.jpg',
            ]);
             KomunitasAnggota::create([
                'komunitas_id' => $iscom->id,
                'name' => 'Dewi Lestari',
                'role' => 'Gilang Pratama',
                //'photo' => 'anggota-photos/dewi.jpg',
            ]);
            KomunitasAnggota::create([
                'komunitas_id' => $iscom->id,
                'name' => 'Ahmad Budi',
                'role' => 'Anggota',
            ]);
            KomunitasAnggota::create([
                'komunitas_id' => $iscom->id,
                'name' => 'Eka Sari',
                'role' => 'Anggota',
            ]);
            KomunitasAnggota::create([
                'komunitas_id' => $iscom->id,
                'name' => 'Fajar Nugraha',
                'role' => 'Anggota',
            ]);
            KomunitasAnggota::create([
                'komunitas_id' => $iscom->id,
                'name' => 'Gita Amelia',
                'role' => 'Anggota',
            ]);

            // Menambahkan agenda untuk Iscom
            KomunitasAgenda::create([
                'komunitas_id' => $iscom->id,
                'title' => 'Pelatihan Competitive Programming',
                'schedule' => \Illuminate\Support\Carbon::parse('2025-08-15 10:00:00'),
                'description' => 'Sesi latihan rutin untuk mempersiapkan anggota menghadapi kompetisi pemrograman.',
            ]);
            KomunitasAgenda::create([
                'komunitas_id' => $iscom->id,
                'title' => 'Sesi Sharing "Berkarir di Dunia IT"',
                'schedule' => \Illuminate\Support\Carbon::parse('2025-08-15 10:00:00'),
                'description' => 'Mengundang alumni untuk berbagi pengalaman dan tips sukses di industri.',
            ]);
            KomunitasAgenda::create([
                'komunitas_id' => $iscom->id,
                'title' => 'Proyek Grup: Web Development',
                'schedule' => \Illuminate\Support\Carbon::parse('2025-08-15 10:00:00'),
                'description' => 'Kolaborasi dalam tim untuk membangun aplikasi web dari awal hingga akhir.',
            ]);
    }
}
