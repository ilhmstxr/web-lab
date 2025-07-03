@extends('layouts.app')

@section('content')
    <main class="relative isolate overflow-hidden bg-gradient-to-br from-blue-50 to-indigo-100 py-16 px-4 sm:px-6 lg:px-8">

        <div class="absolute inset-0 -z-10 opacity-30">
            <svg class="h-full w-full stroke-blue-200 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]"
                aria-hidden="true">
                <defs>
                    <pattern id="grid-pattern" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
                        <path d="M.5 200V.5H200" fill="none" />
                    </pattern>
                </defs>
                <svg x="50%" y="-1" class="overflow-visible fill-gray-50">
                    <path d="M-200 0h201v201h-201Z M600 0h201v201h-201Z M-400 600h201v201h-201Z M200 800h201v201h-201Z"
                        stroke-width="0" />
                </svg>
                <rect width="100%" height="100%" fill="url(#grid-pattern)" />
            </svg>
        </div>

        <div class="absolute left-[calc(50%-4rem)] top-10 -z-10 blur-3xl sm:left-[calc(50%-18rem)] lg:left-48 lg:top-[calc(50%-30rem)] xl:left-[calc(50%-24rem)]"
            aria-hidden="true">
            <div class="aspect-[1108/632] w-[69.25rem] bg-gradient-to-r from-[#d1e7ff] to-[#a0c4ff] opacity-40"
                style="clip-path: polygon(73.6% 51.7%, 91.7% 11.8%, 100% 46.4%, 97.4% 82.2%, 92.5% 84.9%, 75.7% 64%, 55.3% 47.5%, 46.5% 49.4%, 45% 76.8%, 25.6% 97.7%, 0% 70.6%, 12.5% 68.3%, 45% 80.4%, 60.9% 77.2%, 84.2% 46.3%, 69.5% 44.9%);">
            </div>
        </div>

        <article
            class="max-w-4xl mx-auto bg-white shadow-2xl rounded-3xl border border-gray-100 transform transition duration-300 hover:scale-[1.01] hover:shadow-3xl">
            <div class="p-8 sm:p-10 lg:p-14">

                @if ($kegiatan->poster)
                    <div class="mb-10 flex justify-center">
                        <div
                            class="w-52 h-52 sm:w-64 sm:h-64 overflow-hidden rounded-2xl shadow-xl border border-gray-200 transition hover:scale-105 hover:rotate-2">
                            <img src="{{ asset('storage/' . $kegiatan->poster) }}" alt="Poster {{ $kegiatan->judul }}"
                                class="w-full h-full object-cover">
                        </div>
                    </div>
                @endif

                <h1
                    class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-blue-800 mb-6 text-center animate-fade-in-up">
                    {{ $kegiatan->judul }}
                </h1>

                <div
                    class="flex flex-col sm:flex-row justify-center items-center gap-4 text-sm sm:text-base text-gray-600 mb-10 border-y border-gray-100 py-4">
                    <div class="flex items-center gap-2 text-blue-700 font-medium">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-blue-500" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path
                                d="M8 7V3m8 4V3m-9 8h10M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>{{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('d F Y') }}</span>
                    </div>
                    <span class="hidden sm:inline-block text-gray-300">|</span>
                    <div class="flex items-center gap-2 text-blue-700 font-medium">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-blue-500" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path d="M7 7l10 10M17 7L7 17M12 21a9 9 0 110-18 9 9 0 010 18z" />
                        </svg>
                        <span>{{ $kegiatan->kategori }}</span>
                    </div>
                    @php
                        $wordCount = str_word_count(strip_tags($kegiatan->deskripsi));
                        $readingTimeMinutes = ceil($wordCount / 200);
                    @endphp
                    <span class="hidden sm:inline-block text-gray-300">|</span>
                    <div class="flex items-center gap-2 text-gray-600">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Baca sekitar {{ $readingTimeMinutes }} menit</span>
                    </div>
                    @if (isset($kegiatan->views_count))
                        <span class="hidden sm:inline-block text-gray-300">|</span>
                        <div class="flex items-center gap-2 text-gray-600">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M.5 9.5a10 10 0 0 1 19 0 10 10 0 0 1-19 0z" />
                                <path d="M9 12a3 3 0 1 0 6 0 3 3 0 0 0-6 0z" />
                                <path d="M1 12s4 8 11 8 11-8 11-8-4-8-11-8-11 8-11 8z" />
                            </svg>
                            <span>{{ number_format($kegiatan->views_count) }} Kali Dilihat</span>
                        </div>
                    @endif
                </div>

                @if ($kegiatan->youtube_url)
                    @php
                        $videoId = '';
                        if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i', $kegiatan->youtube_url, $matches)) {
                            $videoId = $matches[1];
                        }
                    @endphp

                    @if ($videoId)
                        <div class="mb-8">
                            <div class="video-container rounded-lg overflow-hidden shadow-md">
                                <iframe src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen loading="lazy" class="w-full h-full">
                                </iframe>
                            </div>
                        </div>
                    @else
                        <p class="text-red-500 text-center mb-8">URL YouTube yang dimasukkan tidak valid:
                            {{ $kegiatan->youtube_url }}
                        </p>
                    @endif
                @endif
                @if ($kegiatan->tempat)
                    <div class="mb-8 p-4 bg-blue-50 rounded-lg shadow-sm border border-blue-100">
                        <h2 class="text-xl font-bold text-blue-700 mb-2">Lokasi Kegiatan</h2>
                        <p class="text-gray-700 text-lg font-semibold">{{ $kegiatan->tempat }}</p>
                        <p class="text-gray-600 text-sm mt-2">
                            (<a href="https://maps.google.com/?q={{ urlencode($kegiatan->tempat) }}" target="_blank"
                                class="text-blue-600 hover:underline">Lihat di Google Maps</a>)
                        </p>
                    </div>
                @endif
                <div
                    class="prose prose-sm sm:prose-base lg:prose-lg max-w-none text-gray-800 leading-relaxed mx-auto text-justify space-y-4">
                    {!! $kegiatan->deskripsi !!}
                </div>

                <hr class="my-12 border-gray-200">

                <div class="flex items-center justify-center gap-4 mb-8">
                    <button id="like-button"
                        class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-red-500 text-white font-bold text-lg hover:bg-red-600 transition-colors shadow-lg transform hover:scale-105">
                        <svg id="like-icon" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                        </svg>
                        <span id="like-count">{{ $kegiatan->likes_count ?? 0 }}</span> Suka
                    </button>
                </div>

                <section class="max-w-3xl mx-auto mt-12 bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                    <h2 class="text-2xl font-bold text-blue-800 mb-6 text-center">Komentar</h2>

                    <form id="comment-form" action="{{ route('comments.store') }}" method="POST" class="mb-8">
                        @csrf
                        <input type="hidden" name="kegiatan_id" value="{{ $kegiatan->id }}">
                        <div class="mb-4">
                            <label for="comment-name" class="block text-sm font-medium text-gray-700 mb-1">Nama Anda
                                (Opsional):</label>
                            <input type="text" name="name" id="comment-name"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400"
                                placeholder="Nama Anda (mis: Anonim)">
                        </div>
                        <textarea name="content" id="comment-content" rows="4"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400"
                            placeholder="Tulis komentar Anda di sini..." required></textarea>
                        <div class="mt-4 text-right">
                            <button type="submit"
                                class="inline-flex items-center px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition-colors">
                                Kirim Komentar
                            </button>
                        </div>
                    </form>

                    <div id="comments-list">
                        @forelse ($kegiatan->comments as $comment)
                            <div class="bg-gray-50 p-4 rounded-lg mb-4 border border-gray-200 shadow-sm">
                                <div class="flex items-center justify-between mb-2">
                                    <p class="font-semibold text-gray-800">{{ $comment->name ?? 'Pengguna Anonim' }}</p>
                                    <span class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-gray-700 leading-relaxed">{{ $comment->content }}</p>
                            </div>
                        @empty
                            <p class="text-center text-gray-500">Belum ada komentar untuk kegiatan ini.</p>
                        @endforelse
                    </div>
                </section>

                <div class="flex flex-wrap justify-center gap-4 mt-16 mb-16">
                    <span class="text-gray-700 font-semibold text-lg me-4 hidden sm:block">Bagikan:</span>
                    <a href="https://api.whatsapp.com/send?text={{ urlencode($kegiatan->judul . ' - ' . url()->current()) }}"
                        target="_blank"
                        class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-green-500 text-white hover:bg-green-600 transition-colors shadow-md">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12.04 2c-5.45 0-9.91 4.46-9.91 9.91 0 1.75.5 3.42 1.45 4.9L2.05 22l5.05-1.32c1.47.8 3.14 1.23 4.9 1.23 5.45 0 9.91-4.46 9.91-9.91s-4.46-9.91-9.91-9.91zm0 2c4.35 0 7.91 3.56 7.91 7.91s-3.56 7.91-7.91 7.91c-1.42 0-2.8-.37-4.01-1.03l-.3-.18-3.12.82.84-3.04-.2-.31c-.75-1.16-1.15-2.5-1.15-3.87 0-4.35 3.56-7.91 7.91-7.91zm-3.08 5.67c-.2-.09-.44-.15-.65.1-.2.24-.76.99-.83 1.06-.07.07-.13.1-.25.03-.12-.06-.27-.1-.58-.36-.4-.32-.95-.89-1.3-1.63-.35-.74-.06-1.15.2-1.42.17-.14.36-.2.48-.2.12 0 .23-.02.32-.02.1-.01.2-.01.29.1.09.11.36.4.39.87.03.47.03.87-.01 1.06-.04.19-.1.21-.19.31-.08.1-.17.18-.26.25-.09.07-.18.13-.27.2zm4.33 3.25c.09.2.18.18.32.1.14-.09.65-.24 1.2-.49.55-.25.9-.45 1.15-.49.25-.04.4-.04.56.09.16.14.21.32.25.4.04.09.04.17.06.27s.02.19-.06.29c-.08.1-.17.18-.27.25-.09.07-.18.13-.27.2-.09.07-.18.1-.25.13-.07.03-.1-.01-.2-.04-.09-.03-.18-.06-.27-.1zm-.88.66c-.63 0-1.2-.2-1.74-.59l-.14-.08-.34.1-.37.1-.38.07c-.4.07-.8.07-1.19.01l-.22-.05-.22-.05c-.32-.09-.64-.2-.95-.35l-.2-.1-.2-.09c-1.3-.6-2.31-1.72-2.83-2.9l-.14-.3-.12-.32c-.06-.17-.11-.34-.14-.52-.03-.18-.04-.37-.02-.55.02-.18.06-.36.1-.53s.09-.34.15-.5c.06-.16.12-.31.18-.46s-.12-.29.17-.43l.1-.2.1-.2c.06-.11.13-.2.2-.29s.14-.18.2-.24l.09-.09c.4-.3.84-.52 1.29-.65.45-.13.92-.16 1.38-.1l.24.03.24.04.24.06c.32.09.64.2.95.34l.2.1.2.09c1.3.6 2.31 1.72 2.83 2.9l.14.3.12.32c.06.17.11.34.14.52.03.18.04.37.02.55-.02.18-.06.36-.1-.53s-.09.34-.15.5c-.06.16-.12.31-.18.46s-.12.29-.17.43l-.1.2-.1.2c-.06.11-.13.2-.2.29s-.14.18-.2.24l-.09.09c-.4.3-.84.52-1.29.65-.45.13-.92.16-1.38.1z" />
                        </svg>
                        WhatsApp
                    </a>
                    <a href="https://twitter.com/intent/tweet?text={{ urlencode($kegiatan->judul) }}&url={{ url()->current() }}"
                        target="_blank"
                        class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-blue-400 text-white hover:bg-blue-500 transition-colors shadow-md">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M22.46 6c-.84.37-1.74.62-2.67.73.96-.57 1.7-1.48 2.04-2.57-.9.53-1.9.92-2.94 1.13-1.63-1.73-4.71-1.29-5.9.15-1.07 1.28-1.07 3.3.01 4.58-3.7-.19-7.07-1.96-9.3-4.66-.39.67-.61 1.45-.61 2.27 0 1.58.8 2.97 2.02 3.79-.74-.02-1.44-.23-2.05-.56v.03c0 2.19 1.56 4.02 3.63 4.44-.37.1-.76.15-1.16.15-.28 0-.55-.03-.81-.08.58 1.8 2.26 3.1 4.25 3.14-1.55 1.22-3.51 1.95-5.64 1.95-.36 0-.7-.02-1.05-.06 2.01 1.29 4.39 2.05 6.96 2.05 8.35 0 12.92-6.92 12.92-12.93v-.59c.9-.65 1.68-1.46 2.3-2.38z" />
                        </svg>
                        X (Twitter)
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank"
                        class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-blue-600 text-white hover:bg-blue-700 transition-colors shadow-md">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm3 8h-2V7h-3v3H7v3h3v5h3v-5h2l1-3z" />
                        </svg>
                        Facebook
                    </a>
                    <button onclick="copyToClipboard('{{ url()->current() }}', this)"
                        class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-gray-500 text-white hover:bg-gray-600 transition-colors shadow-md copy-link-btn">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M8 5H6a2 2 0 00-2 2v10a2 2 0 002 2h2m8-12h2a2 2 0 012 2v10a2 2 0 01-2 2h-2M9 12h6" />
                        </svg>
                        <span>Salin Link</span>
                    </button>
                </div>

                <div class="mt-16 text-center">
                    <a href="{{ route('kegiatan.index') }}"
                        class="inline-flex items-center gap-3 px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-bold text-base rounded-full shadow-xl hover:from-blue-700 hover:to-indigo-800 hover:-translate-y-1 hover:scale-105 transition transform duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M15 19l-7-7 7-7" />
                        </svg>
                        <span>Kembali ke Daftar Kegiatan</span>
                    </a>
                </div>
            </div>
        </article>

        @if ($relatedKegiatans->count() > 0)
            <section class="max-w-4xl mx-auto mt-16 p-8 bg-white shadow-2xl rounded-3xl border border-gray-100">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-blue-800 mb-8 text-center">Kegiatan Terkait Lainnya</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($relatedKegiatans as $relatedKegiatan)
                        <div
                            class="bg-blue-50 rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-lg">
                            @if ($relatedKegiatan->poster)
                                <img src="{{ asset('storage/' . $relatedKegiatan->poster) }}" alt="{{ $relatedKegiatan->judul }}"
                                    class="w-full h-40 object-cover">
                            @else
                                <div class="w-full h-40 bg-gray-200 flex items-center justify-center text-gray-500">No Image</div>
                            @endif
                            <div class="p-5">
                                <h3 class="text-lg font-semibold text-blue-700 mb-2 truncate">{{ $relatedKegiatan->judul }}</h3>
                                <p class="text-sm text-gray-600 mb-3">
                                    {{ \Carbon\Carbon::parse($relatedKegiatan->tanggal)->translatedFormat('d M Y') }} |
                                    {{ $relatedKegiatan->kategori }}
                                </p>
                                <a href="{{ route('kegiatan.show', $relatedKegiatan->id) }}"
                                    class="text-blue-600 hover:underline text-sm font-medium">Baca Selengkapnya →</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

    </main>
    <style>
        @keyframes fadeInMoveUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInMoveUp 0.8s ease-out forwards;
        }

        .video-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
            background-color: #000;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .prose img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .prose iframe {
            width: 100%;
            max-width: 100%;
            height: auto;
            aspect-ratio: 16 / 9;
            display: block;
            margin: auto;
        }
    </style>

    <script>
        function copyToClipboard(text, button) {
            navigator.clipboard.writeText(text).then(function () {
                const originalText = button.querySelector('span').textContent;
                button.querySelector('span').textContent = 'Link Tersalin!';
                setTimeout(() => {
                    button.querySelector('span').textContent = originalText;
                }, 2000);
            }).catch(function (error) {
                console.error('Gagal menyalin teks: ', error);
                alert('Gagal menyalin link.');
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            const likeButton = document.getElementById('like-button');
            const likeIcon = document.getElementById('like-icon');
            const likeCountSpan = document.getElementById('like-count');

            if (likeButton) {
                // Inisialisasi ikon like berdasarkan status dari sesi
                // $isLikedByUser sudah dikirim dari controller berdasarkan Session::get('liked_kegiatan', [])
                if ({{ $isLikedByUser ? 'true' : 'false' }}) {
                    likeIcon.innerHTML = '<path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />'; // Ikon hati penuh
                    likeIcon.classList.add('text-red-600');
                } else {
                    likeIcon.innerHTML = '<path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5A4.5 4.5 0 017.5 4C9.24 4 10.91 4.81 12 6.09c1.09-1.28 2.76-2.09 4.5-2.09C19.58 4 22 6.42 22 9.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35zM7.5 6C5.57 6 4 7.57 4 9.5c0 2.22 2.65 4.98 7.35 9.45L12 19.34l.65-.59C17.35 14.48 20 11.72 20 9.5 20 7.57 18.43 6 16.5 6c-1.74 0-3.41.81-4.5 2.09C10.91 6.81 9.24 6 7.5 6z" />'; // Ikon hati kosong
                    likeIcon.classList.remove('text-red-600');
                }


                likeButton.addEventListener('click', function () {
                    fetch("{{ route('kegiatan.toggleLike', $kegiatan->id) }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                likeCountSpan.textContent = data.likes_count;
                                if (data.liked) {
                                    likeIcon.innerHTML = '<path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />'; // Ikon hati penuh
                                    likeIcon.classList.add('text-red-600');
                                } else {
                                    likeIcon.innerHTML = '<path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5A4.5 4.5 0 017.5 4C9.24 4 10.91 4.81 12 6.09c1.09-1.28 2.76-2.09 4.5-2.09C19.58 4 22 6.42 22 9.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35zM7.5 6C5.57 6 4 7.57 4 9.5c0 2.22 2.65 4.98 7.35 9.45L12 19.34l.65-.59C17.35 14.48 20 11.72 20 9.5 20 7.57 18.43 6 16.5 6c-1.74 0-3.41.81-4.5 2.09C10.91 6.81 9.24 6 7.5 6z" />'; // Ikon hati kosong
                                    likeIcon.classList.remove('text-red-600');
                                }
                            } else {
                                alert('Terjadi kesalahan: ' + data.message);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Terjadi kesalahan saat memproses like.');
                        });
                });
            }
        });
    </script>
@endsection