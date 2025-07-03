@extends('public.layouts.app')

@section('title', 'Profil Laboratorium - TechLab University')

@push('styles')
<style>

    /* Animasi untuk konten tab */
.tab-content-animate {
    opacity: 0;
    transform: translateY(40px);
    transition: opacity 0.6s cubic-bezier(0.4,0,0.2,1), transform 0.6s cubic-bezier(0.4,0,0.2,1);
}
.tab-content-animate.active {
    opacity: 1;
    transform: translateY(0);
}

    .carousel-overlay {
    position: absolute;
    inset: 0;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background: linear-gradient(180deg, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.7) 100%);
    color: #fff;
    z-index: 10;
    text-align: center;
    pointer-events: none; /* agar tombol carousel tetap bisa diklik */
    padding: 0 2rem;
}

.carousel-title, .carousel-subtitle {
    transition: opacity 0.5s, transform 0.5s;
}
.carousel-text-animate-out {
    opacity: 0;
    transform: translateY(30px);
}
.carousel-text-animate-in {
    opacity: 1;
    transform: translateY(0);
}

.carousel-title {
    font-size: 4.5rem;
    font-weight: bold;
    margin-bottom: 0.5rem;
    letter-spacing: 2px;
    text-shadow: 0 4px 16px rgba(0,0,0,0.4);
    animation: fadeInDown 1s;
    line-height: 1.1;
}

.carousel-subtitle {
    font-size: 2.2rem;
    font-weight: 500;
    margin-bottom: 1rem;
    text-shadow: 0 2px 8px rgba(0,0,0,0.3);
    animation: fadeInUp 1.2s;
    line-height: 1.2;
}

.carousel-desc {
    font-size: 1.5rem;
    max-width: 600px;
    margin: 0 auto;
    text-shadow: 0 1px 4px rgba(0,0,0,0.2);
    animation: fadeIn 1.5s;
    line-height: 1.4;
}

@keyframes fadeInDown {
    from { opacity: 0; transform: translateY(-30px);}
    to { opacity: 1; transform: translateY(0);}
}
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px);}
    to { opacity: 1; transform: translateY(0);}
}
@keyframes fadeIn {
    from { opacity: 0;}
    to { opacity: 1;}
}

    /* Tambahkan style lainnya dari HTML asli */
    .carousel-img {
    opacity: 0;
    transition: opacity 0.7s cubic-bezier(0.4, 0, 0.2, 1), transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);
    z-index: 0;
    position: absolute;
    inset: 0;
    transform: translateX(0);
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.carousel-img.active {
    opacity: 1;
    z-index: 1;
    transform: translateX(0);
}
.carousel-img.slide-in-right {
    opacity: 1;
    z-index: 2;
    transform: translateX(100%);
    animation: slideInRight 0.7s forwards;
}
.carousel-img.slide-in-left {
    opacity: 1;
    z-index: 2;
    transform: translateX(-100%);
    animation: slideInLeft 0.7s forwards;
}
.carousel-img.slide-out-left {
    opacity: 0;
    z-index: 1;
    animation: slideOutLeft 0.7s forwards;
}
.carousel-img.slide-out-right {
    opacity: 0;
    z-index: 1;
    animation: slideOutRight 0.7s forwards;
}

@keyframes slideInRight {
    from { transform: translateX(100%); }
    to { transform: translateX(0); }
}
@keyframes slideInLeft {
    from { transform: translateX(-100%); }
    to { transform: translateX(0); }
}
@keyframes slideOutLeft {
    from { transform: translateX(0); }
    to { transform: translateX(-100%); }
}
@keyframes slideOutRight {
    from { transform: translateX(0); }
    to { transform: translateX(100%); }
}

.tab-button {
    background-color: transparent;
    color: #374151; /* text-gray-700 */
}
.tab-button:hover {
    background-color: #e5e7eb; /* bg-gray-200 */
    color: #374151;
}
.tab-active {
    background-color: #e5e7eb !important; /* bg-gray-200 */
    color: #374151 !important;
}

.carousel-arrow {
    border: none;
    outline: none;
    cursor: pointer;
    box-shadow: 0 4px 16px rgba(0,0,0,0.15);
    transition: all 0.3s cubic-bezier(0.4,0,0.2,1);
    display: flex;
    align-items: center;
    justify-content: center;
}
.carousel-arrow:hover {
    background-color: #3b82f6 !important; /* blue-500 */
    color: #fff !important;
    transform: scale(1.1);
    box-shadow: 0 8px 24px rgba(59,130,246,0.25);
}

.carousel-dot {
    display: inline-block;
    width: 36px;
    height: 6px;
    border-radius: 3px;
    background: #fff;
    opacity: 0.6;
    transition: opacity 0.3s, background 0.3s;
}
.carousel-dot.active {
    opacity: 1;
    box-shadow: 0 2px 8px rgba(0,0,0,0.2);
}

/* --- Tambahan Responsif --- */
@media (max-width: 900px) {
    .carousel-title {
        font-size: 2.0rem;
    }
    .carousel-subtitle {
        font-size: 1.3rem;
    }
    .carousel-desc {
        font-size: 1rem;
    }
    .carousel-overlay {
        padding: 0 1rem;
    }
    #carousel-images {
        height: 100% !important;
        min-height: 0;
    }
}
@media (max-width: 600px) {
    .carousel-title {
        font-size: 1.5rem;
        margin-bottom: 0.3rem;
    }
    .carousel-subtitle {
        font-size: 1rem;
        margin-bottom: 0.5rem;
    }
    .carousel-desc {
        font-size: 0.95rem;
        max-width: 95vw;
    }
    .carousel-overlay {
        padding: 0 0.5rem;
        background: linear-gradient(180deg, rgba(0,0,0,0.55) 0%, rgba(0,0,0,0.85) 100%);
    }
    #carousel-images {
        height: 100% !important;
        min-height: 0;
    }
    .carousel-arrow {
        width: 28px;
        height: 28px;
        padding: 0.25rem;
    }
    .carousel-arrow svg {
        width: 18px;
        height: 18px;
    }
    .carousel-dot {
        width: 18px;
        height: 5px;
    }
}

/* Highlight kata kunci di deskripsi carousel */
.carousel-desc .highlight {
    color: #fff;
    font-weight: normal;
    background: none;
    border-radius: 0;
    padding: 0;
    transition: none;
}
</style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="h-screen gradient-bg flex items-center justify-center relative overflow-hidden p-0 m-0">
        <div class="relative w-full h-full">
            <!-- Caroussel Images -->
            <div id="carousel-images" class="w-full h-full relative">
                <img src="{{ asset('img/lab-Solusi-1.jpeg') }}" alt="lab-solusi" class="carousel-img w-full h-full object-cover object-center">
                <img src="{{ asset('img/Lab-MSI-1.jpeg') }}" alt="lab-msi" class="carousel-img absolute inset-0 w-full h-full object-cover object-center">
                <img src="{{ asset('img/lab-statistika.jpeg') }}" alt="lab-msi" class="carousel-img absolute inset-0 w-full h-full object-cover object-center">
            </div>
            <div class="carousel-overlay">
                <h1 class="carousel-title">Profile Lab Sistem Informasi</h1>
                <p class="carousel-subtitle">Menciptakan Inovasi, Menginspirasi Generasi</p>
                <p class="carousel-desc">Tempat di mana kreativitas bertemu teknologi dan masa depan dibangun bersama.</p>
            </div>
            <button onclick="prevSlide()" class="carousel-arrow absolute left-4 top-1/2 -translate-y-1/2 z-20 bg-white bg-opacity-80 rounded-full p-3 shadow-lg hover:bg-blue-500 hover:text-white hover:scale-110 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button onclick="nextSlide()" class="carousel-arrow absolute right-4 top-1/2 -translate-y-1/2 z-20 bg-white bg-opacity-80 rounded-full p-3 shadow-lg hover:bg-blue-500 hover:text-white hover:scale-110 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
            <!-- Carousel Indicators -->
            <div id="carousel-indicators" class="absolute bottom-8 left-1/2 -translate-x-1/2 flex space-x-4 z-30">
                <!-- Indikator akan di-generate oleh JavaScript -->
            </div>
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

@endsection

@push('scripts')
    <script>

    let currentSlide = 0;
    const images = document.querySelectorAll('#carousel-images .carousel-img');
    let isAnimating = false;

    // Data Headline & Subheadline untuk setiap slide
    const carouselData = [
        {
            title: "Profile Lab Sistem Informasi",
            subtitle: "Menciptakan Inovasi, Menginspirasi Generasi",
            desc: "Tempat di mana kreativitas bertemu teknologi dan masa depan dibangun bersama."
        },
        {
            title: "Profile Lab MSI",
            subtitle: "Kolaborasi dan Riset Terkini",
            desc: "Kolaborasi, riset, dan pengembangan teknologi informasi terkini."
        },
        {
            title: "Profile Lab Statistika",
            subtitle: "Analisis Data untuk Masa Depan",
            desc: "Statistika dan analisis data untuk solusi masa depan."
        }
    ];

    // Fungsi untuk highlight kata kunci pada deskripsi
    function highlightKeywords(text) {
        const keywords = [
            'kreativitas', 'teknologi', 'masa depan', 'kolaborasi', 'riset', 'pengembangan', 'statistika', 'analisis data', 'solusi'
        ];
        let result = text;
        keywords.forEach(word => {
            // Case-insensitive, whole word only
            const regex = new RegExp(`(\\b${word.replace(/[-/\\^$*+?.()|[\]{}]/g, '\\$&')}\\b)`, 'gi');
            result = result.replace(regex, '<span class="highlight">$1</span>');
        });
        return result;
    }

    // Efek typewriter untuk deskripsi (plain text, lalu highlight setelah selesai)
    function typewriterEffect(element, text, onComplete, speed = 18) {
        element.textContent = '';
        let i = 0;
        function type() {
            if (i < text.length) {
                element.textContent += text[i];
                i++;
                setTimeout(type, speed);
            } else if (onComplete) {
                onComplete();
            }
        }
        type();
    }

    // Fungsi untuk update judul, subjudul, dan deskripsi dengan animasi interaktif
    function animateCarouselText(index) {
        const titleEl = document.querySelector('.carousel-title');
        const subtitleEl = document.querySelector('.carousel-subtitle');
        const descEl = document.querySelector('.carousel-desc');

        // Animasi keluar
        titleEl.classList.remove('carousel-text-animate-in');
        subtitleEl.classList.remove('carousel-text-animate-in');
        if (descEl) descEl.classList.remove('carousel-text-animate-in');
        titleEl.classList.add('carousel-text-animate-out');
        subtitleEl.classList.add('carousel-text-animate-out');
        if (descEl) descEl.classList.add('carousel-text-animate-out');

        setTimeout(() => {
            // Ganti teks
            titleEl.textContent = carouselData[index].title;
            subtitleEl.textContent = carouselData[index].subtitle;
            if (descEl) {
                const plain = carouselData[index].desc;
                typewriterEffect(descEl, plain, function() {
                    descEl.innerHTML = highlightKeywords(plain);
                }, 18);
            }

            // Animasi masuk
            titleEl.classList.remove('carousel-text-animate-out');
            subtitleEl.classList.remove('carousel-text-animate-out');
            if (descEl) descEl.classList.remove('carousel-text-animate-out');
            titleEl.classList.add('carousel-text-animate-in');
            subtitleEl.classList.add('carousel-text-animate-in');
            if (descEl) descEl.classList.add('carousel-text-animate-in');
        }, 500);
    }

    // Generate indicators sesuai jumlah gambar
    const indicatorsContainer = document.getElementById('carousel-indicators');
    indicatorsContainer.innerHTML = '';
    for (let i = 0; i < images.length; i++) {
        const dot = document.createElement('span');
        dot.className = 'carousel-dot';
        dot.addEventListener('click', function() {
            if (isAnimating || i === currentSlide) return;
            showSlide(i, i > currentSlide ? 'right' : 'left');
        });
        indicatorsContainer.appendChild(dot);
    }
    const indicators = indicatorsContainer.querySelectorAll('.carousel-dot');

    function updateIndicators() {
        indicators.forEach((dot, idx) => {
            dot.classList.toggle('active', idx === currentSlide);
        });
    }

    function showSlide(newIndex, direction) {
        if (isAnimating || newIndex === currentSlide) return;
        isAnimating = true;
        const oldIndex = currentSlide;
        const oldImg = images[oldIndex];
        const newImg = images[newIndex];
        images.forEach(img => {
            img.classList.remove('active', 'slide-in-right', 'slide-in-left', 'slide-out-left', 'slide-out-right');
        });
        if (direction === 'right') {
            oldImg.classList.add('slide-out-left');
            newImg.classList.add('slide-in-right');
        } else {
            oldImg.classList.add('slide-out-right');
            newImg.classList.add('slide-in-left');
        }
        setTimeout(() => {
            images.forEach(img => {
                img.classList.remove('active', 'slide-in-right', 'slide-in-left', 'slide-out-left', 'slide-out-right');
            });
            newImg.classList.add('active');
            currentSlide = newIndex;
            updateIndicators();
            animateCarouselText(newIndex);
            isAnimating = false;
        }, 700);
    }

    document.addEventListener('DOMContentLoaded', function() {
    // Fungsi untuk mengaktifkan animasi saat elemen masuk viewport
    function animateOnScroll(elementId) {
        const el = document.getElementById(elementId);
        if (!el) return;

        const observer = new IntersectionObserver(
            (entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        el.classList.add('active');
                        observer.unobserve(entry.target); // animasi hanya sekali, hapus baris ini jika ingin animasi berulang
                    }
                });
            },
            { threshold: 0.2 } // 20% elemen terlihat, animasi aktif
        );
        observer.observe(el);
    }

    animateOnScroll('lab1-anim');
    animateOnScroll('lab2-anim');

    images[0].classList.add('active');
    updateIndicators();
    animateCarouselText(0);
}); 

    function nextSlide() {
        if (isAnimating) return;
        const newIndex = (currentSlide + 1) % images.length;
        showSlide(newIndex, 'right');
    }

    function prevSlide() {
        if (isAnimating) return;
        const newIndex = (currentSlide - 1 + images.length) % images.length;
        showSlide(newIndex, 'left');
    }

    function switchLab(lab) {
    const lab1 = document.getElementById('content-lab1');
    const lab2 = document.getElementById('content-lab2');
    const tab1 = document.getElementById('tab-lab1');
    const tab2 = document.getElementById('tab-lab2');
    const lab1Anim = document.getElementById('lab1-anim');
    const lab2Anim = document.getElementById('lab2-anim');

    // Reset semua tab
    tab1.classList.remove('tab-active');
    tab2.classList.remove('tab-active');

    // Sembunyikan animasi dulu
    if (lab1Anim) lab1Anim.classList.remove('active');
    if (lab2Anim) lab2Anim.classList.remove('active');

    if (lab === 'lab1') {
        lab1.classList.remove('hidden');
        lab2.classList.add('hidden');
        tab1.classList.add('tab-active');
        setTimeout(() => {
            if (lab1Anim) lab1Anim.classList.add('active');
        }, 50);
    } else {
        lab1.classList.add('hidden');
        lab2.classList.remove('hidden');
        tab2.classList.add('tab-active');
        setTimeout(() => {
            if (lab2Anim) lab2Anim.classList.add('active');
        }, 50);
    }
}

    // Mobile menu toggle
    var mobileMenuBtn = document.getElementById('mobile-menu-btn');
    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', function() {
            var menu = document.getElementById('mobile-menu');
            if (menu) {
                menu.classList.toggle('hidden');
            }
        });
    }

    // Tambahkan auto-slide setiap 5 detik
    let carouselInterval = setInterval(nextSlide, 5000);
    </script>
@endpush