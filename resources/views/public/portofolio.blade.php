@extends('layout.main')
@section('content')
    <main class="container mx-auto p-4 sm:p-6 lg:p-8">

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 lg:gap-8">

            {{-- Mulai perulangan data proyek --}}
            @foreach ($projects as $project)
                <div class="bg-white border-2 border-black p-1 group">
                    <div class="border-2 border-black h-full flex flex-col">

                        <div class="aspect-[3/2] w-full bg-gray-200 flex items-center justify-center overflow-hidden">
                            {{-- Ganti 'image' dengan path gambar Anda --}}
                            <img src="{{ $project['Image'] }}" alt="{{ $project['Name'] }}"
                                class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                        </div>

                        <div class="p-5 border-t-2 border-black flex-grow flex flex-col">
                            <h3 class="text-2xl lg:text-3xl font-bold text-black">{{ $project['Title'] }}</h3>

                            <div class="flex flex-wrap items-center gap-2 my-3">
                                @foreach ($project['Tags'] as $tag)
                                    <span
                                        class="flex items-center gap-1.5 {{ $tag['color'] }} {{ in_array($tag['color'], ['bg-slate-800', 'bg-black']) ? 'text-white' : 'text-black' }} text-xs font-bold px-2 py-0.5 border-2 border-black">
                                        @if ($tag['icon'] === 'star')
                                            <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <path
                                                    d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61483 7.84006L12.0006 0.5L15.3864 7.84006L23.4133 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z">
                                                </path>
                                            </svg>
                                        @else
                                            <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <path
                                                    d="M3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM4 5V19H20V5H4ZM8 7H16V9H8V7ZM8 11H12V13H8V11Z">
                                                </path>
                                            </svg>
                                        @endif
                                        <span>{{ $tag['text'] }}</span>
                                    </span>
                                @endforeach
                            </div>

                            <p class="font-mono text-gray-700 text-sm flex-grow">
                                {{ $project['description'] }}
                            </p>
                        </div>

                    </div>
                </div>
            @endforeach
            {{-- Akhir perulangan --}}

        </div>
    </main>
@endsection
