@extends('layout.main')
@section('content')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Mengatur font default */
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Kelas untuk mencegah kartu terbelah di antara kolom */
        .card-wrapper {
            break-inside: avoid;
            -webkit-column-break-inside: avoid;
        }

        /* CSS untuk animasi fade-in dengan JavaScript */
        .card-animate {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.4s ease-out, transform 0.4s ease-out;
        }

        .card-animate.is-visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
    <main class="container mx-auto p-4 sm:p-6 lg:p-12">

        <div class="columns-1 md:columns-2 lg:columns-3 gap-8">

            @foreach ($projects as $p)
                <div class="card-wrapper mb-8 card-animate">
                    <div
                        class="bg-[#98CAF7]/25 border border-slate-700/50 rounded-xl flex flex-col gap-5 p-6 shadow-lg shadow-black/20">
                        <div>
                            <h3 class="text-lg  font-bold  text-slate-900">{{ $p->Title }}</h3>
                            <p class="text-sm text-slate-800 mt-2 leading-relaxed">{{$p->Description}}</p>
                            <div class="mt-4 flex flex-wrap gap-2">
                                <span class="text-xs bg-[#2386DD] text-slate-300 px-2.5 py-1 rounded-full">Next.js 14</span>
                                <span
                                    class="text-xs bg-[#2386DD] text-slate-300 px-2.5 py-1 rounded-full">TailwindCSS</span>
                                <span class="text-xs bg-[#2386DD] text-slate-300 px-2.5 py-1 rounded-full">ShadcnUI</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <a href="#"
                                class="h-8 w-8 rounded-full bg-[#010409] hover:bg-slate-600 flex items-center justify-center transition-colors"
                                title="GitHub"><svg class="w-4 h-4 text-white" viewBox="0 0 16 16" fill="currentColor">
                                    <path
                                        d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z">
                                    </path>
                                </svg></a>
                            <a href="#"
                                class="h-8 w-8 rounded-full bg-[#0d1117] hover:bg-slate-600 flex items-center justify-center transition-colors"
                                title="Live Preview"><svg class="w-4 h-4 text-white" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                    <polyline points="15 3 21 3 21 9"></polyline>
                                    <line x1="10" y1="14" x2="21" y2="3"></line>
                                </svg></a>
                        </div>
                        <hr class="border-slate-700">
                        <a href="#" class="block"><img
                                src="https://placehold.co/600x400/020617/FFF.png?text=Next+Form" class="w-full rounded-md"
                                alt="Next Form Preview"></a>
                    </div>
                </div>
            @endforeach

        </div>

    </main>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const cards = document.querySelectorAll('.card-animate');
            if (!cards.length) return;

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });

            cards.forEach(card => {
                observer.observe(card);
            });
        });
    </script>
@endsection
