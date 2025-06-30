<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Laboratorium - LabConnect</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        /* Custom styles to match the theme */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7fafc;
            /* bg-card for the whole page */
            color: #1a202c;
        }

        .font-headline {
            font-weight: 800;
            letter-spacing: -0.025em;
        }

        .text-primary {
            color: #4f46e5;
        }

        .text-foreground-80 {
            color: #4a5568;
        }

        .bg-accent {
            background-color: #4f46e5;
        }

        .bg-accent:hover {
            background-color: #4338ca;
        }

        .text-accent-foreground {
            color: #ffffff;
        }

        .bg-destructive-10 {
            background-color: #fee2e2;
        }

        .text-destructive {
            color: #dc2626;
        }

        .bg-accent-10 {
            background-color: #e0e7ff;
        }

        .text-accent {
            color: #4f46e5;
        }
    </style>
</head>

<body class="antialiased">

    <!-- Header & Navigation -->
    <header class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-gray-200">
        <div class="container mx-auto px-4 md:px-6">
            <nav class="flex items-center justify-between h-16">
                <a href="#" class="text-xl font-bold text-primary">LabConnect</a>
                <a href="lab-attendance-page.html"
                    class="inline-flex items-center justify-center rounded-md bg-accent px-4 py-2 text-sm font-medium text-accent-foreground shadow-sm transition-colors hover:bg-accent/90">
                    Halaman Absensi
                </a>
            </nav>
        </div>
    </header>

    <main class="flex-1 py-12 md:py-24 lg:py-32">
        <div class="container mx-auto px-4 md:px-6">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold tracking-tighter sm:text-5xl text-primary font-headline">
                    Manajemen Laboratorium
                </h1>
                <p class="max-w-[800px] mx-auto text-foreground-80 md:text-xl mt-4">
                    Pesan jadwal penggunaan lab, lihat fasilitas yang tersedia, dan kelola kehadiran Anda dengan mudah.
                </p>
            </div>

            <!-- Tabs -->
            <div class="w-full">
                <div class="grid w-full grid-cols-2 border-b" id="tabs-container">
                    <button id="tab-booking"
                        class="tab-trigger py-4 px-1 text-center font-medium border-b-2 border-primary text-primary">
                        Pemesanan & Jadwal
                    </button>
                    <button id="tab-facilities"
                        class="tab-trigger py-4 px-1 text-center font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700">
                        Fasilitas & Informasi
                    </button>
                </div>
                <div id="content-booking" class="tab-content mt-8">
                    <div class="grid lg:grid-cols-3 gap-12">
                        <!-- Booking Form -->
                        <div class="rounded-lg border bg-white shadow-sm">
                            <div class="p-4">
                                <h3 class="text-2xl font-bold mb-1">Formulir Pemesanan Online</h3>
                                <p class="text-foreground-80 mb-6">Isi formulir di bawah ini untuk melakukan pemesanan
                                    jadwal penggunaan lab.</p>
                                <form id="bookingForm" class="space-y-6">
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama
                                            Lengkap</label>
                                        <input type="text" id="name" name="name" placeholder="Nama Anda"
                                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border"
                                            required>
                                    </div>
                                    <div>
                                        <label for="noWa" class="block text-sm font-medium text-gray-700 mb-1">Nomor
                                            WhatsApp</label>
                                        <input type="text" id="noWa" name="noWa"
                                            placeholder="Nomor Whatsapp Aktif"
                                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border"
                                            required>
                                    </div>
                                    <div>
                                        <label for="institution"
                                            class="block text-sm font-medium text-gray-700 mb-1">Institusi / Program
                                            Studi</label>
                                        <input type="text" id="institution" name="institution"
                                            placeholder="Institusi / Program Studi"
                                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border"
                                            required>
                                    </div>
                                    <div>
                                        <label for="purpose"
                                            class="block text-sm font-medium text-gray-700 mb-1">Tujuan</label>
                                        <input type="text" id="purpose" name="purpose"
                                            placeholder="informasikan Tujuan anda menyewa lab"
                                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border"
                                            required>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label for="lab"
                                                class="block text-sm font-medium text-gray-700 mb-1">Laboratorium</label>
                                            <select id="lab" name="lab"
                                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border"
                                                required>
                                                <option value="" disabled selected>Pilih laboratorium</option>
                                                <option value="biotek">Lab Solusi Sistem Informasi</option>
                                                <option value="biotek">Lab Manajemen Sistem Informasi</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="date"
                                                class="block text-sm font-medium text-gray-700 mb-1">Tanggal
                                                Penggunaan</label>
                                            <input type="date" id="bookingDate" name="date"
                                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border"
                                                required>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6">

                                        <div>
                                            <div class="mb-4">
                                                <label for="session_start"
                                                    class="block text-sm font-medium text-gray-700 mb-1">
                                                    Sesi Awal
                                                </label>
                                                <select id="session_start" name="session_start"
                                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border"
                                                    required>
                                                    <option value="" disabled selected>Pilih sesi awal</option>
                                                </select>
                                            </div>

                                            <div>
                                                <label for="session_end"
                                                    class="block text-sm font-medium text-gray-700 mb-1">
                                                    Sesi Akhir
                                                </label>
                                                <select id="session_end" name="session_end"
                                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border"
                                                    required>
                                                    <option value="" disabled selected>Pilih sesi akhir</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="mb-4">
                                                <label for="time_start"
                                                    class="block text-sm font-medium text-gray-700 mb-1">
                                                    Pukul Awal
                                                </label>
                                                <input type="time" id="time_start" name="time_start"
                                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border"
                                                    required>
                                            </div>

                                            <div>
                                                <label for="time_end"
                                                    class="block text-sm font-medium text-gray-700 mb-1">
                                                    Pukul Akhir
                                                </label>
                                                <input type="time" id="time_end" name="time_end"
                                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border"
                                                    required>
                                            </div>
                                        </div>

                                    </div>
                                    <button type="submit"
                                        class="w-full inline-flex items-center justify-center rounded-md bg-accent px-4 py-2 text-sm font-medium text-accent-foreground shadow-sm transition-colors hover:bg-accent/90">
                                        Kirim Permintaan
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!-- Schedule Table -->
                        <div class="rounded-lg border bg-white shadow-sm lg:col-span-2">
                            <div class="p-4">
                                <h3 class="text-2xl font-bold mb-1">Jadwal Penggunaan Laboratorium</h3>
                                <p class="text-gray-600 mb-6">Jadwal penggunaan harian untuk laboratorium di hari
                                    kerja.</p>

                                <div class="overflow-x-auto">
                                    <table class="w-full text-sm text-left border-collapse border border-gray-300">
                                        <thead class="bg-gray-100 text-center font-bold">
                                            <tr>
                                                <th rowspan="2" class="px-4 py-3 border border-gray-300">Sesi</th>
                                                <th rowspan="2" class="px-4 py-3 border border-gray-300">Jam</th>
                                                <th colspan="{{ count($daysOfWeek) }}"
                                                    class="px-4 py-3 border border-gray-300">Hari</th>
                                            </tr>
                                            <tr>
                                                @foreach ($daysOfWeek as $day)
                                                    <th class="px-4 py-3 border border-gray-300">{{ $day }}
                                                    </th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white text-center">
                                            @foreach ($sessionDetails as $sessionId => $details)
                                                <tr>
                                                    <td class="px-4 py-2 border border-gray-300 font-medium">
                                                        {{ $details['name'] }}</td>
                                                    <td class="px-4 py-2 border border-gray-300">{{ $details['time'] }}
                                                    </td>

                                                    @foreach ($daysOfWeek as $day)
                                                        {{-- Cek apakah ada data di grid untuk sesi dan hari ini --}}
                                                        @if (isset($scheduleGrid[$sessionId][$day]))
                                                            @php
                                                                $cellData = $scheduleGrid[$sessionId][$day];
                                                            @endphp
                                                            <td class="px-4 py-2 border border-gray-300 text-white"
                                                                style="background-color: {{ $cellData['color'] }};">
                                                                {{ $cellData['title'] }}
                                                            </td>
                                                        @else
                                                            {{-- Jika tidak ada data, tampilkan strip --}}
                                                            <td class="px-4 py-2 border border-gray-300">-</td>
                                                        @endif
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right text-xs text-gray-500 mt-4">
                                    Last updated: {{ now()->format('l, j F Y H:i') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="content-facilities" class="tab-content mt-8 hidden space-y-8">
                    <!-- Facility Details -->
                    <div class="rounded-lg border bg-white shadow-sm">
                        <div class="p-6">
                            <h3 class="text-2xl font-bold mb-1">Fasilitas Laboratorium</h3>
                            <p class="text-foreground-80 mb-6">Berikut adalah beberapa fasilitas dan peralatan utama
                                yang tersedia di laboratorium kami.</p>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="facility-list">
                                <!-- Facility Data Populated Here -->
                            </div>
                        </div>
                    </div>
                    <!-- Attendance Info -->
                    <div class="rounded-lg border bg-primary/5 border-primary/20 p-6 flex items-start gap-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="w-10 h-10 text-primary flex-shrink-0">
                            <rect width="18" height="18" x="3" y="3" rx="2" />
                            <line x1="8" x2="8" y1="7" y2="17" />
                            <line x1="12" x2="12" y1="7" y2="17" />
                            <line x1="16" x2="16" y1="7" y2="17" />
                            <line x1="7" x2="17" y1="8" y2="8" />
                            <line x1="7" x2="17" y1="12" y2="12" />
                            <line x1="7" x2="17" y1="16" y2="16" />
                        </svg>
                        <div>
                            <h4 class="text-xl font-bold">Absensi Kehadiran</h4>
                            <p class="text-foreground-80 mt-2">Setiap pengguna lab diwajibkan untuk melakukan absensi
                                dengan memindai kode QR yang tersedia di pintu masuk laboratorium. Pencatatan kehadiran
                                ini penting untuk tujuan keamanan dan administrasi. Pastikan Anda melakukan scan saat
                                masuk dan keluar lab.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-auto">
        <div class="container mx-auto py-8 px-4 md:px-6 text-center">
            <p>&copy; 2024 LabConnect. All Rights Reserved.</p>
        </div>
    </footer>

    <script>
        // 1. Ambil data dari PHP/Laravel
        // 1. Ambil data dari PHP/Laravel
        const allSchedules = @json($schedules);
        const bookedSlotsLookup = new Set(@json($bookedSlots));

        // 2. Dapatkan referensi ke semua elemen HTML yang dibutuhkan
        const dateInput = document.getElementById('bookingDate');
        const sessionSelectStart = document.getElementById('session_start');
        const sessionSelectEnd = document.getElementById('session_end');
        const timeStartInput = document.getElementById('time_start');
        const timeEndInput = document.getElementById('time_end');

        /**
         * Fungsi bantuan untuk mengisi sebuah dropdown sesi.
         * Dibuat agar tidak mengulang kode yang sama untuk Sesi Awal dan Sesi Akhir.
         * @param {HTMLSelectElement} selectElement - Elemen <select> yang akan diisi.
         * @param {Array} sessions - Daftar sesi yang mungkin untuk hari itu.
         * @param {string} selectedDate - Tanggal yang dipilih (format YYYY-MM-DD).
         */
        function populateSessionDropdown(selectElement, sessions, selectedDate) {
            // Kosongkan opsi sebelumnya
            selectElement.innerHTML = '';

            // Jika ada sesi yang mungkin untuk hari itu
            if (sessions.length > 0) {
                selectElement.disabled = false;

                // Tambahkan opsi placeholder default
                const placeholderText = selectElement.id === 'session_start' ? 'Pilih sesi awal' : 'Pilih sesi akhir';
                let defaultOption = new Option(placeholderText, '');
                defaultOption.disabled = true;
                defaultOption.selected = true;
                selectElement.add(defaultOption);

                // Loop melalui setiap sesi yang mungkin
                sessions.forEach(session => {
                    const lookupKey = `${session.id}-${selectedDate}`;
                    const isBooked = bookedSlotsLookup.has(lookupKey);
                    const optionText = `Sesi - ${session.session} `;
                    const finalOptionText = isBooked ? `${optionText} (Sudah Dipesan)` : optionText;

                    let newOption = new Option(finalOptionText, session.id);
                    if (isBooked) {
                        newOption.disabled = true;
                    }
                    selectElement.add(newOption);
                });

            } else {
                // Jika tidak ada sesi sama sekali untuk hari itu
                selectElement.disabled = true;
                let noSessionOption = new Option('Tidak ada sesi tersedia', '');
                noSessionOption.disabled = true;
                selectElement.add(noSessionOption);
            }
        }

        // Tambahkan event listener untuk dropdown "Sesi Awal"
        sessionSelectStart.addEventListener('change', function() {
            // Dapatkan ID sesi yang dipilih dari nilai (value) dropdown
            const selectedSessionId = this.value;

            // Jika pengguna memilih placeholder (value kosong), kosongkan input waktu
            if (!selectedSessionId) {
                timeStartInput.value = '';
                return;
            }

            // Cari data schedule yang cocok di dalam array allSchedules
            const selectedSchedule = allSchedules.find(schedule => schedule.id == selectedSessionId);

            // Jika data ditemukan, isi input "Pukul Awal" dengan start_time
            if (selectedSchedule) {
                timeStartInput.value = selectedSchedule.start_time;
            }
        });

        // Tambahkan event listener untuk dropdown "Sesi Akhir"
        sessionSelectEnd.addEventListener('change', function() {
            const selectedSessionId = this.value;

            if (!selectedSessionId) {
                timeEndInput.value = '';
                return;
            }

            // Cari data schedule yang cocok
            const selectedSchedule = allSchedules.find(schedule => schedule.id == selectedSessionId);

            // Jika data ditemukan, isi input "Pukul Akhir" dengan end_time
            if (selectedSchedule) {
                timeEndInput.value = selectedSchedule.end_time;
            }
        });

        /**
         * Fungsi untuk mereset kedua dropdown ke keadaan awal.
         */
        function resetAllDropdowns() {
            const dropdowns = [sessionSelectStart, sessionSelectEnd];
            dropdowns.forEach(dropdown => {
                dropdown.disabled = true;
                dropdown.innerHTML = '';
                let initialOption = new Option('Pilih tanggal dahulu', '');
                dropdown.add(initialOption);
            });
        }

        // 3. Tambahkan event listener utama ke input tanggal
        dateInput.addEventListener('change', function() {
            const selectedDateString = this.value;
            if (!selectedDateString) {
                resetAllDropdowns();
                return;
            }

            const selectedDate = new Date(this.value);
            const dayOfWeek = selectedDate.getDay();

            if (dayOfWeek === 6 || dayOfWeek === 0) {
                alert('Pemesanan tidak dapat dilakukan pada hari Sabtu atau Minggu.');
                this.value = '';
                resetAllDropdowns();
                return;
            }

            const dbDayOfWeek = (dayOfWeek === 0) ? 7 : dayOfWeek;

            // Dapatkan SEMUA sesi yang mungkin untuk hari yang dipilih
            const potentialSessionsForDay = allSchedules.filter(schedule => schedule.day_of_week == dbDayOfWeek);

            // Panggil fungsi bantuan untuk mengisi kedua dropdown dengan data yang sama
            populateSessionDropdown(sessionSelectStart, potentialSessionsForDay, selectedDateString);
            populateSessionDropdown(sessionSelectEnd, potentialSessionsForDay, selectedDateString);
        });

        // Panggil reset saat halaman pertama kali dimuat untuk mengatur keadaan awal
        resetAllDropdowns();

        document.addEventListener('DOMContentLoaded', function() {

         

            // --- POPULATE DYNAMIC CONTENT ---
            const facilityList = document.getElementById('facility-list');
            facilities.forEach(facility => {
                const labText = facility.lab === 'biotek' ? 'Lab Biotek' : facility.lab === 'material' ?
                    'Lab Material' : 'Kedua Lab';
                const card = `
                    <div class="rounded-lg border bg-white shadow-sm flex flex-col p-4">
                        <div class="flex flex-row items-center gap-4 pb-4">
                            <div class="p-3 bg-accent-10 rounded-full">${facility.icon}</div>
                            <h4 class="text-lg font-semibold">${facility.name}</h4>
                        </div>
                        <div class="flex-1">
                            <p class="text-foreground-80 text-sm">${facility.description}</p>
                        </div>
                        <div class="pt-4 mt-auto">
                            <span class="text-xs text-foreground-80">Tersedia di: ${labText}</span>
                        </div>
                    </div>`;
                facilityList.innerHTML += card;
            });

            const scheduleBody = document.querySelector('#content-booking table tbody');
            scheduleData.forEach(item => {
                const morningStatusClass = item.morning.status === 'Dipesan' ?
                    'bg-destructive-10 text-destructive' : 'bg-accent-10 text-accent';
                const afternoonStatusClass = item.afternoon.status === 'Dipesan' ?
                    'bg-destructive-10 text-destructive' : 'bg-accent-10 text-accent';
                const row = `
                    <tr class="border-b">
                        <td class="px-4 py-3 font-medium">${item.day}</td>
                        <td class="px-4 py-3">
                            <div class="p-2 rounded-md text-center text-xs font-medium ${morningStatusClass}">
                                ${item.morning.lab} <br/> (${item.morning.status})
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <div class="p-2 rounded-md text-center text-xs font-medium ${afternoonStatusClass}">
                                ${item.afternoon.lab} <br/> (${item.afternoon.status})
                            </div>
                        </td>
                    </tr>`;
                scheduleBody.innerHTML += row;
            });

            // --- TABS LOGIC ---
            const tabsContainer = document.getElementById('tabs-container');
            const contentBooking = document.getElementById('content-booking');
            const contentFacilities = document.getElementById('content-facilities');
            const tabBooking = document.getElementById('tab-booking');
            const tabFacilities = document.getElementById('tab-facilities');

            tabsContainer.addEventListener('click', (event) => {
                const id = event.target.id;
                if (id === 'tab-booking' || id === 'tab-facilities') {
                    // Update button styles
                    tabBooking.classList.remove('border-primary', 'text-primary');
                    tabBooking.classList.add('border-transparent', 'text-gray-500');
                    tabFacilities.classList.remove('border-primary', 'text-primary');
                    tabFacilities.classList.add('border-transparent', 'text-gray-500');
                    event.target.classList.add('border-primary', 'text-primary');
                    event.target.classList.remove('border-transparent', 'text-gray-500');

                    // Update content visibility
                    if (id === 'tab-booking') {
                        contentBooking.classList.remove('hidden');
                        contentFacilities.classList.add('hidden');
                    } else {
                        contentBooking.classList.add('hidden');
                        contentFacilities.classList.remove('hidden');
                    }
                }
            });

            // --- FORM SUBMISSION ---
            const bookingForm = document.getElementById('bookingForm');
            bookingForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const name = document.getElementById('name').value;
                const date = document.getElementById('date').value;
                if (name && date) {
                    const formattedDate = new Date(date).toLocaleDateString('id-ID', {
                        weekday: 'long',
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });
                    alert(
                        `Pemesanan Berhasil!\nLab telah dipesan oleh ${name} untuk tanggal ${formattedDate}.`
                    );
                    bookingForm.reset();
                } else {
                    alert('Harap isi semua kolom yang wajib diisi.');
                }
            });
        });
    </script>
</body>

</html>
