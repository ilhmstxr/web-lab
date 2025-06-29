@extends('layouts.app')

@section('content')
    <main
        class="relative isolate overflow-hidden bg-gradient-to-br from-blue-50 to-indigo-100 py-16 px-4 sm:px-6 lg:px-8 min-h-screen flex items-center justify-center">
        <div class="absolute inset-0 -z-10 opacity-30">
            <svg class="h-full w-full stroke-blue-200 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]"
                aria-hidden="true">
                <defs>
                    <pattern id="grid-pattern-add" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
                        <path d="M.5 200V.5H200" fill="none" />
                    </pattern>
                </defs>
                <svg x="50%" y="-1" class="overflow-visible fill-gray-50">
                    <path d="M-200 0h201v201h-201Z M600 0h201v201h-201Z M-400 600h201v201h-201Z M200 800h201v201h-201Z"
                        stroke-width="0" />
                </svg>
                <rect width="100%" height="100%" stroke-width="0" fill="url(#grid-pattern-add)" />
            </svg>
        </div>
        <div class="absolute left-[calc(50%-4rem)] top-10 -z-10 transform-gpu blur-3xl sm:left-[calc(50%-18rem)] lg:left-48 lg:top-[calc(50%-30rem)] xl:left-[calc(50%-24rem)]"
            aria-hidden="true">
            <div class="aspect-[1108/632] w-[69.25rem] bg-gradient-to-r from-[#d1e7ff] to-[#a0c4ff] opacity-40"
                style="clip-path: polygon(73.6% 51.7%, 91.7% 11.8%, 100% 46.4%, 97.4% 82.2%, 92.5% 84.9%, 75.7% 64%, 55.3% 47.5%, 46.5% 49.4%, 45% 76.8%, 25.6% 97.7%, 0% 70.6%, 12.5% 68.3%, 45% 80.4%, 60.9% 77.2%, 84.2% 46.3%, 69.5% 44.9%);">
            </div>
        </div>

        <div
            class="max-w-3xl w-full mx-auto bg-white shadow-2xl rounded-3xl p-8 sm:p-10 lg:p-14 border border-gray-100 transform transition-all duration-300 animate-fade-in-scale">

            <h1 class="text-3xl sm:text-4xl font-extrabold text-blue-800 mb-8 text-center leading-tight">
                <span class="inline-block animate-wave-text">T</span>
                <span class="inline-block animate-wave-text delay-75">a</span>
                <span class="inline-block animate-wave-text delay-150">m</span>
                <span class="inline-block animate-wave-text delay-200">b</span>
                <span class="inline-block animate-wave-text delay-250">a</span>
                <span class="inline-block animate-wave-text delay-300">h</span>
                <span class="inline-block ml-2 animate-wave-text delay-350">K</span>
                <span class="inline-block animate-wave-text delay-400">e</span>
                <span class="inline-block animate-wave-text delay-450">g</span>
                <span class="inline-block animate-wave-text delay-500">i</span>
                <span class="inline-block animate-wave-text delay-550">a</span>
                <span class="inline-block animate-wave-text delay-600">t</span>
                <span class="inline-block animate-wave-text delay-650">a</span>
                <span class="inline-block animate-wave-text delay-700">n</span>
            </h1>

            <form method="POST" action="{{ route('kegiatan.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                @include('admin.kegiatan.form')

                <div class="mt-10 flex flex-col sm:flex-row justify-center items-center gap-4">
                    <button type="submit"
                        class="inline-flex items-center justify-center gap-3 px-10 py-4 bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-bold text-lg rounded-full shadow-xl hover:shadow-2xl hover:from-blue-700 hover:to-indigo-800 transition duration-400 ease-in-out transform hover:-translate-y-1 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-400 focus:ring-offset-2 focus:ring-opacity-75 relative overflow-hidden group w-full sm:w-auto">
                        <span
                            class="absolute right-0 top-0 h-full w-8 -mt-2 -mr-2 bg-blue-700 transform rotate-45 opacity-0 group-hover:opacity-100 transition-all duration-300"></span>
                        <svg class="w-6 h-6 transform -translate-x-1 group-hover:translate-x-0 transition-transform duration-300"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Simpan Kegiatan</span>
                    </button>

                    <a href="{{ route('kegiatan.index') }}"
                        class="inline-flex items-center justify-center gap-3 px-10 py-4 bg-gradient-to-r from-gray-400 to-gray-500 text-white font-bold text-lg rounded-full shadow-xl hover:shadow-2xl hover:from-gray-500 hover:to-gray-600 transition duration-400 ease-in-out transform hover:-translate-y-1 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-gray-300 focus:ring-offset-2 focus:ring-opacity-75 relative overflow-hidden group w-full sm:w-auto">
                        <span
                            class="absolute right-0 top-0 h-full w-8 -mt-2 -mr-2 bg-gray-600 transform rotate-45 opacity-0 group-hover:opacity-100 transition-all duration-300"></span>
                        <svg class="w-6 h-6 transform -translate-x-1 group-hover:translate-x-0 transition-transform duration-300"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M15 19l-7-7 7-7" />
                        </svg>
                        <span>Batal</span>
                    </a>
                </div>
            </form>
        </div>
    </main>

    <style>
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

        @keyframes waveText {

            0%,
            100% {
                transform: translateY(0);
            }

            20% {
                transform: translateY(-5px);
            }

            40% {
                transform: translateY(0);
            }
        }

        .animate-wave-text {
            display: inline-block;
            animation: waveText 1.5s infinite ease-in-out;
        }

        .animate-wave-text.delay-75 {
            animation-delay: 0.075s;
        }

        .animate-wave-text.delay-150 {
            animation-delay: 0.150s;
        }

        .animate-wave-text.delay-200 {
            animation-delay: 0.200s;
        }

        .animate-wave-text.delay-250 {
            animation-delay: 0.250s;
        }

        .animate-wave-text.delay-300 {
            animation-delay: 0.300s;
        }

        .animate-wave-text.delay-350 {
            animation-delay: 0.350s;
        }

        .animate-wave-text.delay-400 {
            animation-delay: 0.400s;
        }

        .animate-wave-text.delay-450 {
            animation-delay: 0.450s;
        }

        .animate-wave-text.delay-500 {
            animation-delay: 0.500s;
        }

        .animate-wave-text.delay-550 {
            animation-delay: 0.550s;
        }

        .animate-wave-text.delay-600 {
            animation-delay: 0.600s;
        }

        .animate-wave-text.delay-650 {
            animation-delay: 0.650s;
        }

        .animate-wave-text.delay-700 {
            animation-delay: 0.700s;
        }
    </style>
@endsection