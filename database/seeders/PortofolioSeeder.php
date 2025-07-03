<?php

namespace Database\Seeders;

use App\Models\Portofolio;
use App\Models\Tags;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortofolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // $portofolio = [
        //     [
        //         'projectName' => 'Website Profil Perusahaan - PT Cipta Kreasi',
        //         'projectDescription' => 'Pengembangan website modern dan responsif untuk profil perusahaan PT Cipta Kreasi yang bergerak di bidang desain grafis.',
        //         'projectImage' => 'https://placehold.co/600x400/5e5ce5/white?text=Cipta+Kreasi',
        //         'projectLink' => 'https://ciptakreasi.example.com',
        //         'projectCategory' => 'Website',
        //         'projectStatus' => 'active',
        //         'projectVisibility' => 'public',
        //     ],
        //     [
        //         'projectName' => 'Aplikasi E-Commerce "Toko Tani"',
        //         'projectDescription' => 'Platform e-commerce untuk menjual produk pertanian segar langsung dari petani ke konsumen.',
        //         'projectImage' => 'https://placehold.co/600x400/5ce58e/black?text=Toko+Tani',
        //         'projectLink' => 'https://tokotani.example.com',
        //         'projectCategory' => 'E-commerce',
        //         'projectStatus' => 'active',
        //         'projectVisibility' => 'public',
        //     ],
        //     [
        //         'projectName' => 'Sistem Manajemen Inventaris Lab',
        //         'projectDescription' => 'Aplikasi internal untuk melacak peminjaman dan pengembalian alat-alat laboratorium secara digital.',
        //         'projectImage' => null, // Contoh gambar dikosongkan
        //         'projectLink' => null,  // Contoh link dikosongkan
        //         'projectCategory' => 'Sistem Informasi',
        //         'projectStatus' => 'active',
        //         'projectVisibility' => 'private',
        //     ],
        //     [
        //         'projectName' => 'Aplikasi Mobile "Jadwalin"',
        //         'projectDescription' => 'Aplikasi mobile berbasis Android & iOS untuk mengatur jadwal harian dan pengingat tugas.',
        //         'projectImage' => 'https://placehold.co/600x400/e5c55c/black?text=Jadwalin',
        //         'projectLink' => 'https://play.google.com/store/apps/details?id=com.jadwalin.example',
        //         'projectCategory' => 'Mobile App',
        //         'projectStatus' => 'inactive', // Contoh status tidak aktif
        //         'projectVisibility' => 'public',
        //     ],
        //     [
        //         'projectName' => 'Platform E-Learning "Pintar Bareng"',
        //         'projectDescription' => 'Platform kursus online dengan fitur video, kuis, dan sertifikat digital untuk berbagai keahlian.',
        //         'projectImage' => 'https://placehold.co/600x400/e55c5c/white?text=Pintar+Bareng',
        //         'projectLink' => 'https://pintarbareng.example.com',
        //         'projectCategory' => 'E-learning',
        //         'projectStatus' => 'active',
        //         'projectVisibility' => 'public',
        //     ],
        // ];
        // Portofolio::insert($portofolio);

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Portofolio::truncate();
        DB::table('portofolio_tag')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Ambil master tags yang sudah dibuat oleh TagSeeder
        $tags = Tags::all()->keyBy('name');

        // --- Data Portofolio ---
        $p1 = Portofolio::create([
            'Name' => 'Sistem Informasi Akademik',
            'Title' => 'Pengembangan SIAKAD Terintegrasi',
            'Description' => 'Platform web untuk mengelola data akademik mahasiswa, dosen, dan mata kuliah secara komprehensif.',
            'Category' => 'Sistem Informasi',
        ]);
        $p1->tags()->attach($tags['Kategori']->id, ['value' => 'Website']);
        $p1->tags()->attach($tags['Teknologi']->id, ['value' => 'Laravel']);
        $p1->tags()->attach($tags['Tahun']->id, ['value' => '2024']);

        $p2 = Portofolio::create([
            'Name' => 'Aplikasi Mobile Presensi',
            'Title' => 'Aplikasi Lintas Platform untuk Presensi',
            'Description' => 'Aplikasi mobile untuk presensi perkuliahan menggunakan QR Code dan GPS.',
            'Category' => 'Aplikasi Mobile',
        ]);
        $p2->tags()->attach($tags['Kategori']->id, ['value' => 'Mobile App']);
        $p2->tags()->attach($tags['Teknologi']->id, ['value' => 'Flutter']);
        $p2->tags()->attach($tags['Tahun']->id, ['value' => '2025']);

        $p3 = Portofolio::create([
            'Name' => 'Desain UI/UX E-Learning',
            'Title' => 'Rancangan Antarmuka Platform Belajar Online',
            'Description' => 'Merancang user interface dan user experience untuk platform e-learning yang intuitif.',
            'Category' => 'UI/UX Design',
        ]);
        $p3->tags()->attach($tags['Kategori']->id, ['value' => 'UI/UX']);
        $p3->tags()->attach($tags['Software']->id, ['value' => 'Figma']);
        $p3->tags()->attach($tags['Tahun']->id, ['value' => '2024']);
        $p4 = Portofolio::create([
            'Name' => 'Desain UI/UX E-Learning',
            'Title' => 'Rancangan Antarmuka Platform Belajar Online',
            'Description' => 'Merancang user interface dan user experience untuk platform e-learning yang intuitif.',
            'Category' => 'UI/UX Design',
        ]);
        $p4->tags()->attach($tags['Kategori']->id, ['value' => 'UI/UX']);
        $p4->tags()->attach($tags['Software']->id, ['value' => 'Figma']);
        $p4->tags()->attach($tags['Tahun']->id, ['value' => '2024']);
        $p5 = Portofolio::create([
            'Name' => 'Desain UI/UX E-Learning',
            'Title' => 'Rancangan Antarmuka Platform Belajar Online',
            'Description' => 'Merancang user interface dan user experience untuk platform e-learning yang intuitif.',
            'Category' => 'UI/UX Design',
        ]);
        $p5->tags()->attach($tags['Kategori']->id, ['value' => 'UI/UX']);
        $p5->tags()->attach($tags['Software']->id, ['value' => 'Figma']);
        $p5->tags()->attach($tags['Tahun']->id, ['value' => '2024']);

//         https://sikesma.isslab.web.id/
// https://batikku.isslab.web.id/
// https://peminjaman.isslab.web.id/
// https://bluehorizon.isslab.web.id/
// https://midikring.isslab.web.id/
// https://tagadventure.isslab.web.id/login.php
// https://web.isslab.web.id/19013/public/
// https://bimapraya.com/
// https://sparksupnjatim.com/

    }
}
