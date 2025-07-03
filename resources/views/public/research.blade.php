@extends('layout.main')

@section('content')
    <style>
        /* Custom styles to match the theme */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
            /* Lighter Gray Background */
            color: #1a202c;
        }

        .font-headline {
            font-weight: 800;
            letter-spacing: -0.025em;
        }

        .text-primary {
            color: #4f46e5;
        }

        .bg-primary {
            background-color: #4f46e5;
        }

        .bg-primary-10 {
            background-color: #e0e7ff;
        }

        .text-primary-foreground {
            color: #ffffff;
        }

        .bg-secondary {
            background-color: #f3f4f6;
        }

        .text-secondary-foreground {
            color: #374151;
        }

        .text-foreground-80 {
            color: #4a5568;
        }

        .text-muted-foreground {
            color: #6b7280;
        }

        .bg-accent {
            background-color: #34d399;
        }

        .text-accent-foreground {
            color: #ffffff;
        }

        .sticky-card {
            position: -webkit-sticky;
            position: sticky;
            top: 6rem;
            /* Adjust this value based on header height */
        }
    </style>

    <style>
        /* Menambahkan font custom agar lebih sesuai dengan gambar */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }
    </style>

    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            {{-- Sidebar Filter --}}
            <aside class="w-full lg:w-1/4">
                {{-- Filter Kategori --}}
                <div class="mb-8">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Categories</h2>
                    <div class="space-y-3">
                        @foreach ($category as $c)
                            <div>
                                {{-- UBAH: Tambahkan class `filter-checkbox` dan `data-type` --}}
                                <input type="checkbox" id="cat-{{ $c->id }}" value="{{ $c->id }}"
                                    class="form-checkbox rounded text-blue-600 filter-checkbox" data-type="categories">
                                <label for="cat-{{ $c->id }}" class="ml-2 text-gray-600">{{ $c->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Filter Topik --}}
                <div class="mb-8">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Topics</h2>
                    <div class="space-y-3">
                        @foreach ($topic as $t)
                            <div>
                                {{-- UBAH: Tambahkan class `filter-checkbox` dan `data-type` --}}
                                <input type="checkbox" id="topic-{{ $t->id }}" value="{{ $t->id }}"
                                    class="form-checkbox rounded text-blue-600 filter-checkbox" data-type="topics">
                                <label for="topic-{{ $t->id }}"
                                    class="ml-2 text-gray-600">{{ $t->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </aside>

            {{-- Konten Utama (Daftar Riset) --}}
            <main class="w-full lg:w-3/4">
                {{-- UBAH: Bungkus daftar riset dengan div#research-list --}}
                <div id="research-list">
                    {{-- Muat daftar riset awal dari partial view --}}
                    @include('public.partials._research_list', ['research' => $research])
                </div>
            </main>
        </div>
    </div>

    {{-- TAMBAHKAN KODE JAVASCRIPT DI SINI --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.filter-checkbox');
            const researchListContainer = document.getElementById('research-list');

            async function fetchFilteredResearch() {
                // Tampilkan loading state (opsional)
                researchListContainer.style.opacity = '0.5';

                const selectedCategories = Array.from(document.querySelectorAll(
                    '.filter-checkbox[data-type="categories"]:checked')).map(cb => cb.value);
                const selectedTopics = Array.from(document.querySelectorAll(
                    '.filter-checkbox[data-type="topics"]:checked')).map(cb => cb.value);

                // Buat URL dengan query parameters
                const url = new URL('{{ route('research.filter') }}');
                selectedCategories.forEach(id => url.searchParams.append('categories[]', id));
                selectedTopics.forEach(id => url.searchParams.append('topics[]', id));

                try {
                    const response = await fetch(url);
                    const html = await response.text();
                    researchListContainer.innerHTML = html;
                } catch (error) {
                    console.error('Error fetching research data:', error);
                    researchListContainer.innerHTML =
                        '<p class="text-red-500">Failed to load research data.</p>';
                } finally {
                    // Hapus loading state
                    researchListContainer.style.opacity = '1';
                }
            }

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', fetchFilteredResearch);
            });

            // Penting: karena konten paginasi dimuat ulang oleh AJAX,
            // kita perlu mendelegasikan event click pada link paginasi.
            document.body.addEventListener('click', function(event) {
                // Cek jika yang diklik adalah link paginasi di dalam #research-list
                if (event.target.matches('#research-list .pagination a')) {
                    event.preventDefault(); // Mencegah link me-refresh halaman
                    const url = event.target.href;

                    // Ambil konten dari halaman paginasi berikutnya
                    fetch(url)
                        .then(response => response.text())
                        .then(html => {
                            researchListContainer.innerHTML = html;
                        })
                        .catch(error => console.error('Error fetching pagination data:', error));
                }
            });
        });
    </script>
@endsection