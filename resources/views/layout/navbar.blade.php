<header class="sticky top-0 z-50 w-full transition-all duration-300 bg-white/80 backdrop-blur-sm shadow-md">
    <div class="container mx-auto flex h-16 items-center justify-between px-4 md:px-6">
        <a href="#home" class="flex items-center gap-2 font-bold text-lg text-blue-600">

            <img class="logo" src='/img/logo-sisfo.jpg' alt="Logo Sisfo" style="width: 7%; height: 7%;" />
            <span class="nav-text-1">Lab Sistem Informasi</span>
        </a>
        <nav class="hidden md:flex items-center gap-6">
            <a href="/" class="text-sm font-medium text-gray-600 hover:text-blue-600">Beranda</a>
            <a href="{{ route('Research.index') }}"
                class="text-sm font-medium text-gray-600 hover:text-blue-600">Riset</a>
            <a href="{{ route('Portofolio.index') }}"
                class="text-sm font-medium text-gray-600 hover:text-blue-600">Portofolio</a>
            <a href="{{ route('Kegiatan.index') }}"
                class="text-sm font-medium text-gray-600 hover:text-blue-600">Kegiatan</a>


            {{-- <a href="{{ route('publications.index') }}"
                class="text-sm font-medium text-gray-600 hover:text-blue-600">Kegiatan</a> --}}
            <nav class="flex items-center space-x-8">

                <div class="relative inline-block text-left">
                    <button type="button" data-dropdown-toggle="dropdown-profil-lab"
                        class="inline-flex items-center gap-1 text-sm font-medium text-gray-700 hover:text-gray-900">
                        Profil Lab
                        <svg class="dropdown-arrow h-4 w-4 transition-transform duration-200"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="dropdown-profil-lab"
                        class="dropdown-menu absolute left-0 z-10 mt-2 w-48 origin-top-left rounded-md bg-white shadow-lg focus:outline-none hidden">
                        <div class="py-1">
                            <a href="{{ route('Profile.index') }}"
                                class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100">Lab
                                SSI</a>
                            <a href="{{ route('Profile.index') }}"
                                class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100">Lab
                                MSI</a>
                        </div>
                    </div>
                </div>

                <div class="relative inline-block text-left">
                    <button type="button" data-dropdown-toggle="dropdown-layanan"
                        class="inline-flex items-center gap-1 text-sm font-medium text-gray-700 hover:text-gray-900">
                        Layanan
                        <svg class="dropdown-arrow h-4 w-4 transition-transform duration-200"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="dropdown-layanan"
                        class="dropdown-menu absolute left-0 z-10 mt-2 w-48 origin-top-left rounded-md bg-white shadow-lg focus:outline-none hidden">
                        <div class="py-1">
                            <a href="{{ route('Sop.index') }}"
                                class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100">SOP
                                Lab</a>
                            <a href="{{ route('LabBooking.index') }}"
                                class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100">Peminjaman Lab</a>
                            <a href="{{ route('FormAbsensi.index') }}"
                                class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100">Form Absensi</a>
                            <a href="{{ route('Absensi.index') }}"
                                class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100">Daftar Presensi</a>
                        </div>
                    </div>
                </div>

                <div class="relative inline-block text-left">
                    <button type="button" data-dropdown-toggle="dropdown-komunitas"
                        class="inline-flex items-center gap-1 text-sm font-medium text-gray-700 hover:text-gray-900">
                        Komunitas
                        <svg class="dropdown-arrow h-4 w-4 transition-transform duration-200"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="dropdown-komunitas"
                        class="dropdown-menu absolute left-0 z-10 mt-2 w-48 origin-top-left rounded-md bg-white shadow-lg focus:outline-none hidden">
                        <div class="py-1">
                            {{-- @foreach ($komunitas as $k)
                                  <a href="{{ route('komunitas.show', $k->id) }}"
                              class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100">{{ $k->name }}</a>
                              @endforeach --}}
                            <a href="{{ route('komunitas.show', 1) }}"
                                class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100">Dicretech</a>
                            <a href="{{ route('komunitas.show', 2) }}"
                                class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100">ISCOM</a>
                        </div>
                    </div>
                </div>

            </nav>


            {{-- <a href="#home" class="text-sm font-medium text-gray-600 hover:text-blue-600">Panduan</a> --}}
            {{-- <a href="#about" class="text-sm font-medium text-gray-600 hover:text-blue-600">Tentang Prodi</a>
            <a href="#lab" class="text-sm font-medium text-gray-600 hover:text-blue-600">Lab Prodi</a>
            <a href="#students" class="text-sm font-medium text-gray-600 hover:text-blue-600">Gerakan Mahasiswa</a> --}}
        </nav>
    </div>
</header>



<script>
    // Ambil semua tombol yang berfungsi sebagai pemicu dropdown
    const dropdownToggles = document.querySelectorAll('[data-dropdown-toggle]');

    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function(event) {
            event.stopPropagation(); // Mencegah klik menyebar ke window

            const targetMenuId = this.getAttribute('data-dropdown-toggle');
            const targetMenu = document.getElementById(targetMenuId);
            const targetArrow = this.querySelector('.dropdown-arrow');

            // --- INI LOGIKA KUNCINYA ---
            // 1. Tutup SEMUA dropdown lain terlebih dahulu
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                // Jika menu ini BUKAN target kita, maka sembunyikan
                if (menu.id !== targetMenuId) {
                    menu.classList.add('hidden');
                    // Dan reset panahnya
                    const otherToggle = document.querySelector(
                        `[data-dropdown-toggle="${menu.id}"]`);
                    otherToggle.querySelector('.dropdown-arrow').classList.remove('rotate-180');
                }
            });

            // 2. Buka/tutup dropdown yang kita klik
            targetMenu.classList.toggle('hidden');
            targetArrow.classList.toggle('rotate-180');
        });
    });

    // Satu listener global untuk menutup semua dropdown jika klik di luar
    window.addEventListener('click', function() {
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
            menu.classList.add('hidden');
        });
        document.querySelectorAll('.dropdown-arrow').forEach(arrow => {
            arrow.classList.remove('rotate-180');
        });
    });
</script>
