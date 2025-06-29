@extends('layouts.app')

@section('content')
    <main class="relative isolate overflow-hidden bg-gradient-to-br from-blue-50 to-indigo-100 py-16 px-4 sm:px-6 lg:px-8">

        {{-- Background Aesthetic --}}
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

        {{-- Gradient Shape --}}
        <div class="absolute left-[calc(50%-4rem)] top-10 -z-10 blur-3xl sm:left-[calc(50%-18rem)] lg:left-48 lg:top-[calc(50%-30rem)] xl:left-[calc(50%-24rem)]"
            aria-hidden="true">
            <div class="aspect-[1108/632] w-[69.25rem] bg-gradient-to-r from-[#d1e7ff] to-[#a0c4ff] opacity-40"
                style="clip-path: polygon(73.6% 51.7%, 91.7% 11.8%, 100% 46.4%, 97.4% 82.2%, 92.5% 84.9%, 75.7% 64%, 55.3% 47.5%, 46.5% 49.4%, 45% 76.8%, 25.6% 97.7%, 0% 70.6%, 12.5% 68.3%, 45% 80.4%, 60.9% 77.2%, 84.2% 46.3%, 69.5% 44.9%);">
            </div>
        </div>

        {{-- Kegiatan Detail --}}
        <article
            class="max-w-4xl mx-auto bg-white shadow-2xl rounded-3xl border border-gray-100 transform transition duration-300 hover:scale-[1.01] hover:shadow-3xl">
            <div class="p-8 sm:p-10 lg:p-14">

                {{-- Poster --}}
                @if ($kegiatan->poster)
                    <div class="mb-10 flex justify-center">
                        <div
                            class="w-52 h-52 sm:w-64 sm:h-64 overflow-hidden rounded-2xl shadow-xl border border-gray-200 transition hover:scale-105 hover:rotate-2">
                            <img src="{{ asset('storage/' . $kegiatan->poster) }}" alt="Poster {{ $kegiatan->judul }}"
                                class="w-full h-full object-cover">
                        </div>
                    </div>
                @endif

                {{-- Judul --}}
                <h1
                    class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-blue-800 mb-6 text-center animate-fade-in-up">
                    {{ $kegiatan->judul }}
                </h1>

                {{-- Tanggal & Kategori --}}
                <div
                    class="flex flex-col sm:flex-row justify-center items-center gap-6 text-md text-gray-600 mb-10 border-y border-gray-100 py-4">
                    <div class="flex items-center gap-2 text-blue-700 font-medium">
                        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path
                                d="M8 7V3m8 4V3m-9 8h10M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>{{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('d F Y') }}</span>
                    </div>
                    <span class="hidden sm:inline-block text-gray-300">|</span>
                    <div class="flex items-center gap-2 text-blue-700 font-medium">
                        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path d="M7 7l10 10M17 7L7 17M12 21a9 9 0 110-18 9 9 0 010 18z" />
                        </svg>
                        <span>{{ $kegiatan->kategori }}</span>
                    </div>
                </div>

                {{-- Deskripsi --}}
                <div
                    class="prose prose-lg sm:prose-xl max-w-none text-gray-800 leading-relaxed mx-auto text-justify space-y-4">
                    {!! nl2br(e($kegiatan->deskripsi)) !!}
                </div>

                {{-- Tombol Kembali --}}
                <div class="mt-16 text-center">
                    <a href="{{ route('kegiatan.user.index') }}"
                        class="inline-flex items-center gap-3 px-10 py-4 bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-bold text-lg rounded-full shadow-xl hover:from-blue-700 hover:to-indigo-800 hover:-translate-y-1 hover:scale-105 transition transform duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M15 19l-7-7 7-7" />
                        </svg>
                        <span>Kembali ke Daftar Kegiatan</span>
                    </a>
                </div>
            </div>
        </article>
    </main>

    {{-- CSS Animasi --}}
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
    </style>
@endsection