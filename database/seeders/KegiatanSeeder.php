<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kegiatan;
use App\Models\User;
use App\Models\Like;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class KegiatanSeeder extends Seeder
{
    public function run(): void
    {
        // Nonaktifkan pemeriksaan foreign key sementara
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Buat atau temukan user dummy
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Admin User', 'password' => bcrypt('password'), 'email_verified_at' => now()]
        );
        $dummyUser1 = User::firstOrCreate(
            ['email' => 'user1@example.com'],
            ['name' => 'User One', 'password' => bcrypt('password'), 'email_verified_at' => now()]
        );
        $dummyUser2 = User::firstOrCreate(
            ['email' => 'user2@example.com'],
            ['name' => 'User Two', 'password' => bcrypt('password'), 'email_verified_at' => now()]
        );

        // Hapus data lama agar tidak duplikat setiap kali seeder dijalankan
        // Urutan truncate tetap dari child ke parent untuk praktik terbaik
        Comment::truncate();
        Like::truncate();
        Kegiatan::truncate();

        // Aktifkan kembali pemeriksaan foreign key
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        $kegiatansData = [
            [
                'judul' => 'Workshop Pengenalan Laravel 10 untuk Pemula',
                'deskripsi' => 'Workshop ini dirancang khusus untuk mahasiswa dan praktisi yang ingin memulai perjalanan mereka di dunia pengembangan web dengan Laravel 10. Materi akan mencakup dasar-dasar MVC, routing, controller, view, Eloquent ORM, hingga konsep otentikasi dan otorisasi. Peserta diharapkan membawa laptop masing-masing. Mentor berpengalaman akan memandu setiap sesi dengan pendekatan hands-on dan studi kasus nyata. Acara ini merupakan kesempatan emas untuk membangun fondasi yang kuat dalam pengembangan aplikasi web modern. Jangan lewatkan kesempatan ini untuk memperluas skillset Anda!',
                'kategori' => 'Workshop',
                'tanggal' => Carbon::parse('2025-07-20'),
                'tempat' => 'Lab Komputer 101, Gedung Utama',
                // Gambar: suasana workshop dengan laptop peserta
                'poster' => 'https://images.unsplash.com/photo-1581091870622-2f73a1f4eac3?auto=format&fit=crop&w=800&q=80',
                // Video: Traversy Media – Laravel From Scratch (4‑hour course)
                'youtube_url' => 'https://www.youtube.com/watch?v=MYyJ4PuL4pY',
                'views_count' => rand(100, 500),
            ],
            [
                'judul' => 'Seminar AI dan Machine Learning di Industri 4.0',
                'deskripsi' => 'Seminar interaktif ini akan membahas tren terbaru dan aplikasi praktis Artificial Intelligence (AI) serta Machine Learning (ML) dalam menghadapi tantangan dan peluang di era Industri 4.0. Pembicara utama adalah para ahli dari industri teknologi terkemuka dan akademisi ternama. Topik yang akan dibahas meliputi Natural Language Processing, Computer Vision, Reinforcement Learning, dan etika AI. Acara ini cocok untuk mahasiswa, peneliti, profesional IT, dan siapa saja yang tertarik pada revolusi teknologi yang sedang berlangsung. Dapatkan insight berharga dan perluas jaringan profesional Anda.',
                'kategori' => 'Seminar',
                'tanggal' => Carbon::parse('2025-08-15'),
                'tempat' => 'Auditorium Fasilkom, Gedung B',
                'poster' => 'https://images.stockcake.com/public/0/b/b/0bbfee62-ee0c-461e-9411-a30749a60349_large/focused-coding-workshop-stockcake.jpg',
                'youtube_url' => 'https://www.youtube.com/watch?v=ua-CiDNNj30',
                'views_count' => rand(200, 700),
            ],
            [
                'judul' => 'Kompetisi Pemrograman Hackathon 24 Jam',
                'deskripsi' => 'Ajang kompetisi pemrograman bergengsi yang menantang peserta untuk mengembangkan solusi inovatif dalam waktu 24 jam. Tema hackathon tahun ini adalah "Teknologi untuk Keberlanjutan Lingkungan". Tim-tim akan bersaing memperebutkan hadiah menarik dan kesempatan untuk direkrut oleh perusahaan startup teknologi. Tersedia mentor ahli yang siap membantu tim mengatasi kendala. Ini adalah kesempatan bagus untuk mengasah kemampuan coding, berpikir kritis, dan bekerja sama dalam tim di bawah tekanan. Daftarkan tim Anda sekarang dan jadilah bagian dari perubahan positif!',
                'kategori' => 'Kompetisi',
                'tanggal' => Carbon::parse('2025-09-10'),
                'tempat' => 'Ruang Inovasi, Pusat IT',
                'poster' => 'https://images.stockcake.com/public/f/5/d/f5dc1cee-7dcb-4698-b219-8e73b6b8050b_large/classroom-coding-session-stockcake.jpg',
                'youtube_url' => 'https://www.youtube.com/watch?v=wX759jG9G2U',
                'views_count' => rand(50, 300),
            ],
            [
                'judul' => 'Pelatihan Keamanan Siber dan Ethical Hacking',
                'deskripsi' => 'Pelatihan intensif ini akan membekali peserta dengan pengetahuan dan keterampilan dasar dalam keamanan siber dan etika hacking. Materi mencakup pengantar ancaman siber, teknik pertahanan jaringan, identifikasi kerentanan, hingga praktik ethical hacking. Peserta akan diajak melakukan simulasi serangan dan pertahanan dalam lingkungan yang terkontrol. Instruktur adalah praktisi keamanan siber bersertifikat. Pelatihan ini sangat relevan bagi Anda yang ingin berkarir di bidang keamanan informasi atau sekadar ingin melindungi data pribadi Anda dari ancaman digital.',
                'kategori' => 'Pelatihan',
                'tanggal' => Carbon::parse('2025-10-01'),
                'tempat' => 'Ruang Pelatihan 203, Gedung Teknik',
                'poster' => 'https://images.stockcake.com/public/2/5/a/25ae1118-a9d8-43e1-8819-9e1a951cd76a_large/students-learning-coding-stockcake.jpg',
                'youtube_url' => 'https://www.youtube.com/watch?v=o_JgA21C7gQ',
                'views_count' => rand(150, 600),
            ],
            [
                'judul' => 'Webinar Pengembangan Karir di Bidang Data Science',
                'deskripsi' => 'Webinar ini akan membahas berbagai jalur karir di bidang Data Science, mulai dari Data Analyst, Machine Learning Engineer, hingga AI Researcher. Pembicara akan berbagi pengalaman, tips, dan trik untuk membangun portofolio yang menarik perhatian recruiter, serta strategi untuk sukses dalam wawancara kerja di industri data. Topik lain yang akan diulas adalah skill set yang dibutuhkan, sertifikasi relevan, dan bagaimana tetap relevan di tengah pesatnya perkembangan teknologi data. Ini adalah kesempatan yang sangat baik untuk mendapatkan panduan karir langsung dari para profesional.',
                'kategori' => 'Webinar',
                'tanggal' => Carbon::parse('2025-11-05'),
                'tempat' => 'Online (Zoom Meeting)',
                'poster' => 'https://images.stockcake.com/public/c/f/c/cfc8e8b5-9719-4dd7-83b6-6aa8852e783f_large/coding-workshop-session-stockcake.jpg',
                // Video: Learn Data Science Tutorial – Full Course for Beginners
                'youtube_url' => 'https://www.youtube.com/watch?v=ua-CiDNNj30',
                'views_count' => rand(80, 400),
            ],
        ];

        foreach ($kegiatansData as $data) {
            $kegiatan = Kegiatan::create($data);

            // Tambahkan Likes
            if ($dummyUser1) {
                $kegiatan->likes()->create(['user_id' => $dummyUser1->id]);
            }
            if ($dummyUser2 && rand(0, 1)) {
                $kegiatan->likes()->create(['user_id' => $dummyUser2->id]);
            }
            if ($adminUser && rand(0, 1)) {
                $kegiatan->likes()->create(['user_id' => $adminUser->id]);
            }

            if ($adminUser) {
                $kegiatan->comments()->create([
                    'user_id' => $adminUser->id,
                    'content' => 'Kegiatan yang sangat informatif dan bermanfaat! Saya sangat menantikannya.'
                ]);
            }
            if ($dummyUser1 && rand(0, 1)) {
                $kegiatan->comments()->create([
                    'user_id' => $dummyUser1->id,
                    'content' => 'Semoga sukses acaranya! Materi yang dibahas sangat relevan dengan kebutuhan industri saat ini.'
                ]);
            }
        }
    }
}