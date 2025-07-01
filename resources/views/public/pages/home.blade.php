@extends('public.layouts.app')

@section('title', 'Profil Laboratorium - TechLab University')

@push('styles')
<style>
    /* Tambahkan style khusus halaman di sini */
    .gradient-bg {
        background: url();
    }
    /* Tambahkan style lainnya dari HTML asli */
    .carousel-img {
    opacity: 0;
    transition: opacity 0.7s cubic-bezier(0.4, 0, 0.2, 1);
    z-index: 0;
    position: absolute;
    inset: 0;
}
.carousel-img.active {
    opacity: 1;
    z-index: 1;
    position: absolute;
    inset: 0;
}
</style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="min-h-screen gradient-bg flex items-center justify-center relative overflow-hidden pt-16 p-0 m-0">
        <div class="relative w-full">
            <!-- Caroussel Images -->
            <div id="carousel-images" class="w-full h-[420px] md:h-[500px] lg:h-[800px] relative">
                <img src="{{ asset('img/lab-Solusi-1.jpeg') }}" alt="lab-solusi" class="carousel-img w-full h-full object-cover object-center">
                <img src="{{ asset('img/Lab-MSI-1.jpeg') }}" alt="lab-msi" class="carousel-img absolute inset-0 w-full object-cover object-center">
            </div>
            <button onclick="prevSlide()" class="absolute left-0 top-1/2 -translate-y-1/2 z-20 bg-white bg-opacity-70 rounded-full p-2 shadow hover:bg-opacity-100 transition">
            &#8592;
            </button>
            <button onclick="nextSlide()" class="absolute right-0 top-1/2 -translate-y-1/2 z-20 bg-white bg-opacity-70 rounded-full p-2 shadow hover:bg-opacity-100 transition">
            &#8594;
            </button>
        </div>    
    </section>

    <!-- Lab Selector Tabs -->
    <section class="py-8 bg-white shadow-md sticky top-16 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center space-x-4">
                <button onclick="switchLab('lab1')" id="tab-lab1" class="tab-button tab-active px-8 py-3 rounded-full font-semibold transition-all duration-300">
                    Lab Solusi
                </button>
                <button onclick="switchLab('lab2')" id="tab-lab2" class="tab-button px-8 py-3 rounded-full font-semibold transition-all duration-300">
                    Lab MSI
                </button>
            </div>
        </div>
    </section>

    <!-- Konten Lab 1 -->
    <div id="content-lab1">
        @include('public.partials.lab1content')
    </div>
    <!-- Konten lab 2 -->
    <div id="content-lab2" class="hidden">
        @include('public.partials.lab2content')
    </div>

    <!-- Bagian Riset, Publikasi, Galeri -->
    <section id="research" class="py-20 bg-gray-50">
        <!-- Konten Riset -->

    </section>
@endsection

@push('scripts')
<script>

let currentSlide = 0;
const images = document.querySelectorAll('#carousel-images .carousel-img');

function showSlide(index) {
    images.forEach((img, i) => {
        if (i === index) {
            img.classList.add('active');
        } else {
            img.classList.remove('active');
        }
    });
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % images.length;
    showSlide(currentSlide);
}

function prevSlide() {
    currentSlide = (currentSlide - 1 + images.length) % images.length;
    showSlide(currentSlide);
}

// Inisialisasi tampilan slide pertama
showSlide(currentSlide);


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
            // Tambahkan background abu-abu ke tab aktif
            tab1.classList.add('bg-gray-200', 'text-gray-700');
        } else {
            lab1.classList.add('hidden');
            lab2.classList.remove('hidden');
            tab1.classList.remove('tab-active');
            tab2.classList.add('tab-active');
            // Tambahkan background abu-abu ke tab aktif
            tab2.classList.add('bg-gray-200', 'text-gray-700');
        }
    }

    // Mobile menu toggle
    document.getElementById('mobile-menu-btn').addEventListener('click', () => {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>
@endpush