@extends('layouts.app')

@section('content')
    <main class="relative isolate overflow-hidden bg-gradient-to-br from-blue-50 to-indigo-100 py-16 px-4 sm:px-6 lg:px-8">
        <div class="absolute inset-0 -z-10 opacity-30">
            <svg class="h-full w-full stroke-blue-200 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]"
                aria-hidden="true">
                <defs>
                    <pattern id="grid-pattern-detail" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
                        <path d="M.5 200V.5H200" fill="none" />
                    </pattern>
                </defs>
                <svg x="50%" y="-1" class="overflow-visible fill-gray-50">
                    <path d="M-200 0h201v201h-201Z M600 0h201v201h-201Z M-400 600h201v201h-201Z M200 800h201v201h-201Z"
                        stroke-width="0" />
                </svg>
                <rect width="100%" height="100%" stroke-width="0" fill="url(#grid-pattern-detail)" />
            </svg>
        </div>
        <div class="absolute left-[calc(50%-4rem)] top-10 -z-10 transform-gpu blur-3xl sm:left-[calc(50%-18rem)] lg:left-48 lg:top-[calc(50%-30rem)] xl:left-[calc(50%-24rem)]"
            aria-hidden="true">
            <div class="aspect-[1108/632] w-[69.25rem] bg-gradient-to-r from-[#d1e7ff] to-[#a0c4ff] opacity-40"
                style="clip-path: polygon(73.6% 51.7%, 91.7% 11.8%, 100% 46.4%, 97.4% 82.2%, 92.5% 84.9%, 75.7% 64%, 55.3% 47.5%, 46.5% 49.4%, 45% 76.8%, 25.6% 97.7%, 0% 70.6%, 12.5% 68.3%, 45% 80.4%, 60.9% 77.2%, 84.2% 46.3%, 69.5% 44.9%);">
            </div>
        </div>

        <article
            class="max-w-4xl mx-auto bg-white shadow-2xl rounded-3xl overflow-hidden border border-gray-100 transform transition-all duration-300 hover:scale-[1.01] hover:shadow-3xl animate-fade-in-scale">
            <div class="p-8 sm:p-10 lg:p-14">

                @if ($kegiatan->poster)
                    <div class="mb-10 flex justify-center">
                        <div
                            class="w-52 h-52 sm:w-64 sm:h-64 overflow-hidden rounded-2xl shadow-xl border border-gray-200 transform transition duration-700 hover:scale-105 hover:rotate-2 focus:outline-none focus:ring-4 focus:ring-blue-300 focus:ring-offset-2 focus:ring-opacity-70 cursor-pointer">
                            <img src="{{ asset('storage/' . $kegiatan->poster) }}" alt="Poster {{ $kegiatan->judul }}"
                                class="object-cover w-full h-full">
                        </div>
                    </div>
                @endif

                <h1
                    class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-blue-800 mb-6 text-center leading-tight tracking-tight animate-fade-in-up">
                    {{ $kegiatan->judul }}
                </h1>

                <div
                    class="flex flex-col sm:flex-row justify-center items-center gap-6 text-md text-gray-600 mb-10 border-y border-gray-100 py-4">
                    <div class="flex items-center gap-2 text-blue-700 font-medium">
                        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path
                                d="M8 7V3m8 4V3m-9 8h10M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span
                            class="whitespace-nowrap">{{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('d F Y') }}</span>
                    </div>

                    <span class="hidden sm:inline-block text-gray-300 select-none" aria-hidden="true">|</span> {{--
                    Separator for larger screens --}}

                    <div class="flex items-center gap-2 text-blue-700 font-medium">
                        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path d="M7 7l10 10M17 7L7 17M12 21a9 9 0 110-18 9 9 0 010 18z" />
                        </svg>
                        <span class="whitespace-nowrap">{{ $kegiatan->kategori }}</span>
                    </div>
                </div>

                <div
                    class="prose prose-lg sm:prose-xl max-w-none text-gray-800 leading-relaxed mx-auto text-justify space-y-4">
                    {!! nl2br(e($kegiatan->deskripsi)) !!}
                </div>

                <div class="mt-16 flex flex-col sm:flex-row justify-center items-center gap-4">
                    <a href="{{ route('kegiatan.edit', $kegiatan) }}"
                        class="inline-flex items-center justify-center gap-3 px-8 py-3 bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-bold text-md rounded-full shadow-lg hover:shadow-xl hover:from-indigo-600 hover:to-purple-700 transition duration-400 ease-in-out transform hover:-translate-y-1 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-indigo-400 focus:ring-offset-2 focus:ring-opacity-75 relative overflow-hidden group w-full sm:w-auto">
                        <span
                            class="absolute right-0 top-0 h-full w-8 -mt-2 -mr-2 bg-indigo-700 transform rotate-45 opacity-0 group-hover:opacity-100 transition-all duration-300"></span>
                        <svg class="w-5 h-5 transform -translate-x-1 group-hover:translate-x-0 transition-transform duration-300"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        <span>Edit Kegiatan</span>
                    </a>

                    <form action="{{ route('kegiatan.destroy', $kegiatan) }}" method="POST"
                        class="inline-block w-full sm:w-auto"
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="inline-flex items-center justify-center gap-3 px-8 py-3 bg-gradient-to-r from-red-500 to-red-600 text-white font-bold text-md rounded-full shadow-lg hover:shadow-xl hover:from-red-600 hover:to-red-700 transition duration-400 ease-in-out transform hover:-translate-y-1 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-red-300 focus:ring-offset-2 focus:ring-opacity-75 relative overflow-hidden group w-full">
                            <span
                                class="absolute right-0 top-0 h-full w-8 -mt-2 -mr-2 bg-red-700 transform rotate-45 opacity-0 group-hover:opacity-100 transition-all duration-300"></span>
                            <svg class="w-5 h-5 transform -translate-x-1 group-hover:translate-x-0 transition-transform duration-300"
                                fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            <span>Hapus Kegiatan</span>
                        </button>
                    </form>

                    <a href="{{ route('kegiatan.index') }}"
                        class="inline-flex items-center justify-center gap-3 px-8 py-3 bg-gradient-to-r from-gray-400 to-gray-500 text-white font-bold text-md rounded-full shadow-lg hover:shadow-xl hover:from-gray-500 hover:to-gray-600 transition duration-400 ease-in-out transform hover:-translate-y-1 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-gray-300 focus:ring-offset-2 focus:ring-opacity-75 relative overflow-hidden group w-full sm:w-auto">
                        <span
                            class="absolute right-0 top-0 h-full w-8 -mt-2 -mr-2 bg-gray-600 transform rotate-45 opacity-0 group-hover:opacity-100 transition-all duration-300"></span>
                        <svg class="w-5 h-5 transform -translate-x-1 group-hover:translate-x-0 transition-transform duration-300"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M15 19l-7-7 7-7" />
                        </svg>
                        <span>Kembali ke Daftar</span>
                    </a>
                </div>
            </div>
        </article>
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

        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-fade-in-scale {
            animation: fadeInScale 0.7s ease-out forwards;
        }
    </style>
@endsection