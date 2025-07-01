 <style>
     body {
         font-family: 'Inter', sans-serif;
     }

     .prose h1,
     .prose h2,
     .prose h3 {
         font-weight: 800;
         color: #111827;
     }

     .prose p {
         color: #374151;
         margin-top: 1em;
         margin-bottom: 1em;
     }

     .prose strong {
         color: #111827;
     }

     .prose ul,
     .prose ol {
         margin-left: 1.5em;
     }
 </style>


 @extends('layout.main')

 @section('content')

     <body class="bg-gray-100">
         <div class="w-full">
             <header class="bg-white shadow-md">
                 <div class="container mx-auto flex h-16 items-center justify-between px-4 md:px-6">
                     <a href="#" class="flex items-center gap-2 font-bold text-lg text-blue-600">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="h-6 w-6">
                             <path d="M10 2v7.31" />
                             <path d="M14 9.31V2" />
                             <path
                                 d="M12 22a7 7 0 0 0 7-7c0-2-1-3.7-3-5.2-1.4-1-3-2.3-3-3.8V2a2 2 0 0 0-4 0v1.3c0 1.5-1.6 2.8-3 3.8-2 1.5-3 3.3-3 5.2a7 7 0 0 0 7 7Z" />
                         </svg>
                         <span>LabConnect</span>
                     </a>
                 </div>
             </header>

             <main class="flex-1 py-8 md:py-12">
                 <div class="container mx-auto px-4 md:px-6">
                     <div class="text-center mb-12">
                         {{-- Logo Komunitas --}}
                         @if ($komunitas->logo)
                             {{-- PERUBAHAN: Ukuran gambar diperbesar (h-32 w-32) dan dibuat kotak (rounded-2xl) --}}
                             <img src="{{ asset('storage/' . $komunitas->logo) }}" alt="Logo {{ $komunitas->name }}"
                                 class="mx-auto mb-6 h-32 w-32 object-cover rounded-2xl shadow-lg border-4 border-white">
                         @endif

                         {{-- Nama Komunitas --}}
                         {{-- PERUBAHAN: Margin atas (mt) dihilangkan agar lebih dekat dengan logo --}}
                         <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight text-blue-600">{{ $komunitas->name }}
                         </h1>

                         {{-- Tagline Komunitas --}}
                         @if ($komunitas->tagline)
                             <p class="text-lg md:text-xl mt-2 text-gray-600 max-w-2xl mx-auto">{{ $komunitas->tagline }}
                             </p>
                         @endif
                     </div>


                     <div class="max-w-4xl mx-auto space-y-12">
                         <div class="bg-white p-4 rounded-2xl shadow-lg">
                             <div class="p-6 border-b">
                                 <h2 class="text-xl font-semibold">Tentang Kami</h2>
                             </div>
                             <div class="p-6">
                                 <p class="text-gray-700 leading-relaxed">
                                     {!! $komunitas->about !!}
                                 </p>
                             </div>
                         </div>

                         <div class="bg-white p-4 rounded-2xl shadow-lg">
                             <div class="p-6 border-b">
                                 <h2 class="text-xl font-semibold flex items-center gap-2">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-blue-600">
                                         <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                         <circle cx="9" cy="7" r="4" />
                                         <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                         <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                     </svg>
                                     <span>Struktur Organisasi</span>
                                 </h2>
                             </div>
                             <div class="p-6 space-y-8">
                                 <div>
                                     <h3 class="text-lg font-semibold mb-4 text-gray-800">Pimpinan Komunitas</h3>
                                     <div class="flex flex-wrap gap-7 justify-center">
                                         @foreach ($komunitas->komunitasAnggotas->where('role', '!=', 'Anggota') as $pimpinan)
                                             <div
                                                 class="flex-1 min-w-[150px] text-center border rounded-lg p-4 hover:shadow-lg transition-shadow">
                                                 {{-- Cek apakah pimpinan punya foto. Jika tidak, tampilkan inisial. --}}
                                                 @if ($pimpinan->photo)
                                                     {{-- Jika ada foto, tampilkan foto tersebut --}}
                                                     <img class="w-24 h-24 mb-3 rounded-full shadow-lg mx-auto object-cover"
                                                         src="{{ $pimpinan->photo ? asset('storage/' . $pimpinan->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($pimpinan->name) . '&background=0D8ABC&color=fff' }}"
                                                     alt="{{ $pimpinan->name }}" @else {{-- Jika tidak ada foto, tampilkan lingkaran dengan inisial nama --}}
                                                         @php
$words = explode(' ', $pimpinan->name);
                                            $initials = '';
                                            if (count($words) >= 2) {
                                                $initials = strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));
                                            } else {
                                                $initials = strtoupper(substr($words[0], 0, 2));
                                            } @endphp
                                                         <div
                                                         class="w-20 h-20 mb-2 border-2 border-blue-600 rounded-full mx-auto flex items-center justify-center bg-gray-200 text-2xl font-semibold text-gray-600">
                                                     {{ $initials }}
                                             </div>
                                         @endif
                                         <p class="font-semibold">{{ $pimpinan->name }}</p>
                                         <p class="text-sm text-blue-600 font-medium">{{ $pimpinan->role }}</p>
                                     </div>
                                     @endforeach
                                 </div>
                             </div>
                             <div>
                                 <h3 class="text-lg font-semibold mb-4 text-gray-800">Anggota Aktif</h3>
                                 <div class="flex flex-wrap gap-2">
                                     {{-- Kita filter: tampilkan anggota yang rolenya HANYA 'Anggota' --}}
                                     @foreach ($komunitas->komunitasAnggotas->where('role', 'Anggota') as $anggota)
                                         <span
                                             class="bg-gray-100 text-gray-800 text-sm font-medium px-3 py-1.5 rounded-full">{{ $anggota->name }}</span>
                                     @endforeach
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="lg:col-span-2 space-y-8">
                         <!-- Agenda Kegiatan -->
                         @if ($komunitas->komunitasAgendas->isNotEmpty())
                             <div class="bg-white p-8 rounded-2xl shadow-lg">
                                 <h2 class="text-3xl font-bold text-gray-900 mb-6 flex items-center">
                                     <svg class="w-8 h-8 mr-3 text-blue-600" fill="none" stroke="currentColor"
                                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                             d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                         </path>
                                     </svg>
                                     Agenda Kegiatan
                                 </h2>
                                 <div class="space-y-6">
                                     {{-- Looping untuk menampilkan setiap agenda --}}
                                     @foreach ($komunitas->komunitasAgendas as $agenda)
                                         <div class="flex items-start">
                                             <div class="flex-shrink-0 mt-1">
                                                 <div class="bg-blue-100 text-blue-600 rounded-full p-2.5">
                                                     <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                         <path stroke-linecap="round" stroke-linejoin="round"
                                                             stroke-width="2"
                                                             d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                     </svg>
                                                 </div>
                                             </div>
                                             <div class="ml-4">
                                                 <h3 class="text-lg font-semibold text-gray-900">{{ $agenda->title }}</h3>
                                                 {{-- Format tanggal dan waktu menjadi (Contoh: Senin, 30 Juni 2025 - 04:23) --}}
                                                 <p class="text-gray-500 text-sm font-medium">
                                                     {{ $agenda->schedule->translatedFormat('l, d F Y - H:i') }} WIB</p>
                                                 <p class="text-gray-600 mt-1">{{ $agenda->description }}</p>
                                             </div>
                                         </div>
                                     @endforeach
                                 </div>
                             </div>
                         @endif
                     </div>
             </main>
             <footer class="bg-blue-600 text-white mt-auto">
                 <div class="container mx-auto py-6 px-4 md:px-6 text-center">
                     <p class="text-sm">© 2024 LabConnect. All rights reserved.</p>
                 </div>
             </footer>
         </div>
     @endsection
