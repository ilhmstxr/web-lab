<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kegiatan Laboratorium</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .parallax {
            background-image: url('https://fasilkom.upnjatim.ac.id/wp-content/uploads/2024/10/Lab-Solusi-1-1080x675.jpeg');
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
        }

        .bg-overlay {
            background-color: rgba(0, 0, 0, 0.6);
        }

        .glass {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .fade-in {
            animation: fadeInUp 1s ease forwards;
            opacity: 0;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- Hero Section -->
    <section class="parallax h-[70vh] flex items-center justify-center relative">
        <div class="absolute inset-0 bg-overlay z-0"></div>
        <div class="z-10 text-center text-white px-6">
            <h1 class="text-5xl font-extrabold drop-shadow-xl">Kegiatan Laboratorium</h1>
            <p class="text-xl mt-4 max-w-2xl mx-auto italic drop-shadow-md">
                Eksplorasi agenda terkini & kolaborasi riset teknologi di Lab Sistem Informasi kami.
            </p>
            <p class="mt-6 max-w-2xl mx-auto text-base text-white/80 fade-in">
                Dari pengembangan perangkat lunak hingga riset AI, setiap kegiatan kami dirancang untuk mendorong
                inovasi, kolaborasi, dan kontribusi nyata bagi masyarakat digital. Bergabunglah dalam perjalanan
                keilmuan yang menyenangkan dan penuh tantangan!
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="py-20 relative z-10">
        <div class="container mx-auto px-6">

            @if ($kegiatans->isEmpty())
                <div class="max-w-3xl mx-auto glass rounded-xl p-10 text-center text-white fade-in shadow-xl">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-3">Belum Ada Kegiatan</h2>
                    <p class="text-gray-900/80">Kami sedang menyusun agenda kegiatan terbaru. Silakan cek kembali nanti!</p>
                </div>
            @else
                <h2 class="text-3xl font-bold text-center text-blue-800 mb-10 fade-in">
                    Agenda Menarik yang Siap Kamu Ikuti
                </h2>
                <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3 fade-in">
                    @foreach ($kegiatans as $kegiatan)
                        <div
                            class="glass rounded-2xl p-6 shadow-xl hover:scale-[1.03] hover:shadow-2xl transition-transform duration-300 text-white backdrop-blur-lg">
                            @if($kegiatan->poster)
                                <img src="{{ asset('storage/' . $kegiatan->poster) }}" alt="Poster {{ $kegiatan->judul }}"
                                    class="rounded-lg h-48 w-full object-cover mb-4 shadow-md">
                            @endif
                            <h3 class="text-xl font-bold">{{ $kegiatan->judul }}</h3>
                            <p class="text-sm text-gray-900/70 mt-1">
                                {{ $kegiatan->tanggal->translatedFormat('d F Y') }} • {{ $kegiatan->kategori }}
                            </p>
                            <p class="mt-4 text-gray-900/90">
                                {{ \Illuminate\Support\Str::limit($kegiatan->deskripsi, 110) }}
                            </p>
                            <a href="{{ route('kegiatan.user.show', $kegiatan) }}"
                                class="inline-block mt-4 text-sm font-medium text-amber-400 hover:underline">
                                Selengkapnya →
                            </a>
                        </div>
                    @endforeach
                </div>

                <!-- CTA / Motivasi -->
                <div class="mt-20 text-center fade-in">
                    <blockquote class="italic text-lg text-gray-600 max-w-xl mx-auto">
                        “Ilmu bukan sekadar untuk dipelajari, tapi untuk dibagikan, diuji, dan dikembangkan bersama.”
                    </blockquote>
                    <p class="mt-4 text-blue-600 font-semibold">
                        Yuk, ambil bagian dalam kegiatan kami berikutnya!
                    </p>
                </div>

                <!-- Tulisan Tambahan -->
                <div class="mt-16 max-w-4xl mx-auto px-6 py-12 bg-blue-50 rounded-xl shadow-inner text-center fade-in">
                    <h3 class="text-2xl font-bold text-blue-800 mb-4">📢 Nantikan Update Menarik Selanjutnya!</h3>
                    <p class="text-gray-700 leading-relaxed max-w-2xl mx-auto">
                        Kami terus memperbarui informasi kegiatan, workshop, dan kolaborasi riset terbaru dari Lab Sistem
                        Informasi. Jangan lewatkan kesempatan untuk terlibat dalam pengalaman belajar dan inovasi bersama!
                    </p>
                    <p class="mt-4 text-blue-600 font-medium">
                        Stay tuned dan pantau terus halaman ini untuk kegiatan seru berikutnya! 🚀
                    </p>
                </div>
            @endif

        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white mt-24">
        <div class="container mx-auto px-6 py-10 text-center">
            <p class="text-sm tracking-wide">&copy; {{ date('Y') }} <strong>Lab Sistem Informasi</strong> — Universitas
                Pembangunan Nasional "Veteran" Jawa Timur.</p>
        </div>
    </footer>

</body>

</html>