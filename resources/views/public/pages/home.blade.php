@extends('layouts.app')

@section('title', 'Profil Laboratorium - TechLab University')

@push('styles')
<style>
    /* Tambahkan style khusus halaman di sini */
    .gradient-bg {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    /* Tambahkan style lainnya dari HTML asli */
</style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="min-h-screen gradient-bg flex items-center justify-center relative overflow-hidden pt-16">
        <!-- Konten Hero -->
    </section>

    <!-- Lab Selector Tabs -->
    <section class="py-8 bg-white shadow-md sticky top-16 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center space-x-4">
                <button onclick="switchLab('lab1')" id="tab-lab1" class="tab-button tab-active px-8 py-3 rounded-full font-semibold transition-all duration-300">
                    Lab Pemrograman & AI
                </button>
                <button onclick="switchLab('lab2')" id="tab-lab2" class="tab-button bg-gray-200 text-gray-700 px-8 py-3 rounded-full font-semibold transition-all duration-300 hover:bg-gray-300">
                    Lab IoT & Robotika
                </button>
            </div>
        </div>
    </section>

    <!-- Konten Lab -->
    <div id="content-lab1">
        @include('partials.lab1-content')
    </div>
    <div id="content-lab2" class="hidden">
        @include('partials.lab2-content')
    </div>

    <!-- Bagian Riset, Publikasi, Galeri -->
    <section id="research" class="py-20 bg-gray-50">
        <!-- Konten Riset -->
    </section>
@endsection

@push('scripts')
<script>
    // JavaScript untuk tab dan mobile menu
    function switchLab(lab) {
        const lab1 = document.getElementById('content-lab1');
        const lab2 = document.getElementById('content-lab2');
        const tab1 = document.getElementById('tab-lab1');
        const tab2 = document.getElementById('tab-lab2');

        if (lab === 'lab1') {
            lab1.classList.remove('hidden');
            lab2.classList.add('hidden');
            tab1.classList.add('tab-active');
            tab2.classList.remove('tab-active');
        } else {
            lab1.classList.add('hidden');
            lab2.classList.remove('hidden');
            tab1.classList.remove('tab-active');
            tab2.classList.add('tab-active');
        }
    }

    // Mobile menu toggle
    document.getElementById('mobile-menu-btn').addEventListener('click', () => {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>
@endpush