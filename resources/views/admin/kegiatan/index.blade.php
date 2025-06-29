@extends('layouts.app')

@section('content')
    <main
        class="relative isolate overflow-hidden bg-gradient-to-br from-blue-50 to-indigo-100 py-16 px-4 sm:px-6 lg:px-8 min-h-screen">
        <div class="absolute inset-0 -z-10 opacity-30">
            <svg class="h-full w-full stroke-blue-200 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]"
                aria-hidden="true">
                <defs>
                    <pattern id="grid-pattern-list" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
                        <path d="M.5 200V.5H200" fill="none" />
                    </pattern>
                </defs>
                <svg x="50%" y="-1" class="overflow-visible fill-gray-50">
                    <path d="M-200 0h201v201h-201Z M600 0h201v201h-201Z M-400 600h201v201h-201Z M200 800h201v201h-201Z"
                        stroke-width="0" />
                </svg>
                <rect width="100%" height="100%" stroke-width="0" fill="url(#grid-pattern-list)" />
            </svg>
        </div>
        <div class="absolute left-[calc(50%-4rem)] top-10 -z-10 transform-gpu blur-3xl sm:left-[calc(50%-18rem)] lg:left-48 lg:top-[calc(50%-30rem)] xl:left-[calc(50%-24rem)]"
            aria-hidden="true">
            <div class="aspect-[1108/632] w-[69.25rem] bg-gradient-to-r from-[#d1e7ff] to-[#a0c4ff] opacity-40"
                style="clip-path: polygon(73.6% 51.7%, 91.7% 11.8%, 100% 46.4%, 97.4% 82.2%, 92.5% 84.9%, 75.7% 64%, 55.3% 47.5%, 46.5% 49.4%, 45% 76.8%, 25.6% 97.7%, 0% 70.6%, 12.5% 68.3%, 45% 80.4%, 60.9% 77.2%, 84.2% 46.3%, 69.5% 44.9%);">
            </div>
        </div>

        <div
            class="max-w-6xl mx-auto bg-white shadow-2xl rounded-3xl p-8 sm:p-10 lg:p-12 border border-gray-100 transform transition-all duration-300 animate-fade-in-scale">

            <h1 class="text-3xl sm:text-4xl font-extrabold text-blue-800 mb-8 text-center leading-tight">
                Daftar Kegiatan
            </h1>

            <div class="mb-8 text-center sm:text-left">
                <a href="{{ route('kegiatan.create') }}"
                    class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-semibold text-base rounded-full shadow-lg hover:shadow-xl hover:from-blue-700 hover:to-indigo-800 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 focus:ring-opacity-75">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Tambah Kegiatan Baru</span>
                </a>
            </div>

            @if($kegiatans->isEmpty())
                <div
                    class="bg-blue-50 border border-blue-200 text-blue-700 px-6 py-8 rounded-xl text-center text-lg font-medium shadow-md">
                    <p class="mb-3">Belum ada kegiatan yang terdaftar.</p>
                    <p>Klik "Tambah Kegiatan Baru" untuk memulai!</p>
                </div>
            @else
                <div class="overflow-x-auto rounded-2xl border border-gray-200 shadow-lg"> {{-- Responsive table wrapper --}}
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gradient-to-r from-blue-50 to-blue-100">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Judul
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-bold text-gray-700 uppercase tracking-wider whitespace-nowrap">
                                    Tanggal</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-bold text-gray-700 uppercase tracking-wider">
                                    Kategori</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-bold text-gray-700 uppercase tracking-wider">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach($kegiatans as $kegiatan)
                                <tr class="hover:bg-blue-50 transition-colors duration-150 ease-in-out">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $kegiatan->judul }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 text-center">
                                        {{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('d F Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 text-center">
                                        {{ $kegiatan->kategori }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium space-x-3">
                                        <a href="{{ route('kegiatan.show', $kegiatan) }}"
                                            class="text-blue-600 hover:text-blue-800 transition duration-150 ease-in-out hover:underline"
                                            title="Lihat Detail">
                                            Lihat
                                        </a>
                                        <a href="{{ route('kegiatan.edit', $kegiatan) }}"
                                            class="text-indigo-600 hover:text-indigo-800 transition duration-150 ease-in-out hover:underline"
                                            title="Edit Kegiatan">
                                            Edit
                                        </a>
                                        <form action="{{ route('kegiatan.destroy', $kegiatan) }}" method="POST" class="inline-block"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-800 transition duration-150 ease-in-out hover:underline"
                                                title="Hapus Kegiatan">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
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
    </style>
@endsection