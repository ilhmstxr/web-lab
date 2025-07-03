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

    .fade-in-item {
        animation: fadeInUp 1s ease forwards;
        opacity: 0;
    }

    .fade-in-item:nth-child(1) {
        animation-delay: 0.1s;
    }

    .fade-in-item:nth-child(2) {
        animation-delay: 0.2s;
    }

    .fade-in-item:nth-child(3) {
        animation-delay: 0.3s;
    }

    .fade-in-item:nth-child(4) {
        animation-delay: 0.4s;
    }

    .fade-in-item:nth-child(5) {
        animation-delay: 0.5s;
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

@extends('layout.main')

@section('content')

    <body class="bg-gray-50 text-gray-800">

        <section class="parallax h-[70vh] flex items-center justify-center relative">
            <div class="absolute inset-0 bg-overlay z-0"></div>
            <div class="z-10 text-center text-white px-6">
                <h1 class="text-5xl font-extrabold drop-shadow-xl">Kegiatan Laboratorium</h1>
                <p class="text-xl mt-4 max-w-2xl mx-auto italic drop-shadow-md">
                    Eksplorasi agenda terkini & kolaborasi riset teknologi di Lab Sistem Informasi kami.
                </p>
                <p class="mt-6 max-w-2xl mx-auto text-base text-white/80 fade-in-item" style="animation-delay: 0.6s;">
                    Dari pengembangan perangkat lunak hingga riset AI, setiap kegiatan kami dirancang untuk mendorong
                    inovasi, kolaborasi, dan kontribusi nyata bagi masyarakat digital. Bergabunglah dalam perjalanan
                    keilmuan yang menyenangkan dan penuh tantangan!
                </p>
            </div>
        </section>

        <main class="py-20 relative z-10">
            <div class="container mx-auto px-6">

                @if ($kegiatans->isEmpty())
                    <div class="max-w-3xl mx-auto glass rounded-xl p-10 text-center text-white fade-in-item shadow-xl">
                        <h2 class="text-2xl font-semibold text-gray-900 mb-3">Belum Ada Kegiatan</h2>
                        <p class="text-gray-900/80">Kami sedang menyusun agenda kegiatan terbaru. Silakan cek kembali nanti!
                        </p>
                    </div>
                @else
                    <h2 class="text-3xl font-bold text-center text-blue-800 mb-10 fade-in-item"
                        style="animation-delay: 0.1s;">
                        Agenda Menarik yang Siap Kamu Ikuti
                    </h2>
                    <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($kegiatans as $kegiatan)
                            <div
                                class="glass rounded-2xl p-6 shadow-xl hover:scale-[1.03] hover:shadow-2xl transition-transform duration-300 text-white backdrop-blur-lg fade-in-item">
                                @if ($kegiatan->poster)
                                    <img src="{{ asset('storage/' . $kegiatan->poster) }}"
                                        alt="Poster {{ $kegiatan->judul }}"
                                        class="rounded-lg h-48 w-full object-cover mb-4 shadow-md">
                                @endif
                                <h3 class="text-xl font-bold text-gray-900">{{ $kegiatan->judul }}</h3>
                                <p class="text-sm text-gray-700 mt-1">
                                    {{ $kegiatan->tanggal->translatedFormat('d F Y') }} • {{ $kegiatan->kategori }}
                                </p>
                                <div class="flex items-center text-gray-600 text-sm mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    {{ $kegiatan->views_count }} Views
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-3 mr-1" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ $kegiatan->likes_count }} Likes
                                </div>
                                <p class="mt-4 text-gray-700">
                                    {{ \Illuminate\Support\Str::limit($kegiatan->deskripsi, 110) }}
                                </p>
                                <a href="{{ route('Kegiatan.show', $kegiatan) }}"
                                    class="inline-block mt-4 text-sm font-medium text-amber-600 hover:underline">
                                    Selengkapnya →
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-10">
                        {{ $kegiatans->links() }}
                    </div>

                    <div class="mt-20 text-center fade-in-item">
                        <blockquote class="italic text-lg text-gray-600 max-w-xl mx-auto">
                            "Ilmu bukan sekadar untuk dipelajari, tapi untuk dibagikan, diuji, dan dikembangkan bersama."
                        </blockquote>
                        <p class="mt-4 text-blue-600 font-semibold">
                            Yuk, ambil bagian dalam kegiatan kami berikutnya!
                        </p>
                    </div>

                    <div
                        class="mt-16 max-w-4xl mx-auto px-6 py-12 bg-blue-50 rounded-xl shadow-inner text-center fade-in-item">
                        <h3 class="text-2xl font-bold text-blue-800 mb-4">📢 Nantikan Update Menarik Selanjutnya!</h3>
                        <p class="text-gray-700 leading-relaxed max-w-2xl mx-auto">
                            Kami terus memperbarui informasi kegiatan, workshop, dan kolaborasi riset terbaru dari Lab
                            Sistem
                            Informasi. Jangan lewatkan kesempatan untuk terlibat dalam pengalaman belajar dan inovasi
                            bersama!
                        </p>
                        <p class="mt-4 text-blue-600 font-medium">
                            Stay tuned dan pantau terus halaman ini untuk kegiatan seru berikutnya! 🚀
                        </p>
                    </div>
                @endif

            </div>
        </main>
    @endsection
