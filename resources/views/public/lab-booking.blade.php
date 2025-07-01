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


@extends('layout.main')
@section('content')

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

                {{-- Notifikasi untuk semua error validasi (dari ->withErrors()) --}}
                @if ($errors->any())
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                        <p class="font-bold">Harap Perbaiki Kesalahan Berikut:</p>
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
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
                                    <p class="text-foreground-80 mb-6">Isi formulir di bawah ini untuk melakukan
                                        pemesanan
                                        jadwal penggunaan lab.</p>

                                    <form id="bookingForm" method="POST" action="{{ route('LabBooking.store') }}"
                                        class="space-y-6">
                                        @csrf

                                        <div>
                                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama
                                                Lengkap</label>
                                            <input type="text" id="name" name="name" placeholder="Nama Anda"
                                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border"
                                                required>
                                        </div>
                                        <div>
                                            <label for="phoneNumber"
                                                class="block text-sm font-medium text-gray-700 mb-1">Nomor
                                                WhatsApp</label>
                                            <input type="text" id="phoneNumber" name="phoneNumber"
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
                                                    @foreach ($labNames as $labName)
                                                        <option value="{{ $labName }}">{{ $labName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                <label for="bookingDate"
                                                    class="block text-sm font-medium text-gray-700 mb-1">Tanggal
                                                    Penggunaan</label>
                                                <input type="date" id="bookingDate" name="bookingDate"
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
                                                        <option value="" disabled selected>Pilih sesi awal
                                                        </option>
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
                                                        <option value="" disabled selected>Pilih sesi akhir
                                                        </option>
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

                                            <div class="col-span-2">
                                                <label for="requiredEquipment"
                                                    class="block text-sm font-medium text-gray-700 mb-1">required
                                                    Equipment</label>
                                                <input type="textarea" id="requiredEquipment" name="requiredEquipment"
                                                    placeholder="Kebutuhan Tambahan (Opsional)"
                                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border">
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
                                <div class="p-6">
                                    <h3 class="text-2xl font-bold mb-1">Jadwal Penggunaan Laboratorium</h3>
                                    <p class="text-gray-600 mb-6">Jadwal penggunaan harian untuk laboratorium di hari
                                        kerja.</p>

                                    <div class="overflow-x-auto">
                                        <table class="w-full text-sm text-left border-collapse border border-gray-300">
                                            <thead class="bg-gray-100 text-center font-bold">
                                                <tr>
                                                    <th rowspan="2"
                                                        class="px-4 py-3 border border-gray-300 align-middle">Sesi</th>
                                                    <th rowspan="2"
                                                        class="px-4 py-3 border border-gray-300 align-middle">Jam</th>
                                                    <th colspan="{{ count($daysOfWeek) }}"
                                                        class="px-4 py-3 border border-gray-300">Hari</th>
                                                </tr>
                                                <tr>
                                                    @foreach ($daysOfWeek as $day)
                                                        <th class="px-4 py-3 border border-gray-300">
                                                            {{ $day }}
                                                        </th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white text-center">
                                                @foreach ($sessionDetails as $sessionId => $details)
                                                    <tr>
                                                        <td class="px-4 py-2 border border-gray-300 font-medium">
                                                            {{ $details['name'] }}</td>
                                                        <td class="px-4 py-2 border border-gray-300">
                                                            {{ $details['time'] }}
                                                        </td>

                                                        {{-- Loop untuk setiap kolom hari --}}
                                                        @foreach ($daysOfWeek as $day)
                                                            <td class="px-2 py-2 border border-gray-300 align-middle">
                                                                {{-- Flex container untuk mengatur posisi lencana di tengah sel --}}
                                                                <div
                                                                    class="flex flex-col items-center justify-center space-y-1">

                                                                    {{-- Loop untuk setiap lab DI DALAM SATU SEL --}}
                                                                    @foreach ($labNames as $labName)
                                                                        {{-- Cek apakah ada data untuk lab spesifik ini di grid --}}
                                                                        @if (isset($scheduleGrid[$sessionId][$day][$labName]))
                                                                            @php
                                                                                $labData =
                                                                                    $scheduleGrid[$sessionId][$day][
                                                                                        $labName
                                                                                    ];
                                                                            @endphp

                                                                            <div class="text-white text-center rounded-md px-3 py-1 w-full max-w-xs"
                                                                                style="background-color: {{ $labData['color'] }};">
                                                                                <div
                                                                                    class="font-bold text-sm leading-tight">
                                                                                    {{ $labName }}</div>
                                                                                <div class="text-xs leading-tight">
                                                                                    ({{ $labData['title'] }})
                                                                                </div>
                                                                            </div>
                                                                        @else
                                                                            {{-- Status default jika tidak ada data --}}
                                                                            <div
                                                                                class="text-gray-700 bg-gray-200 text-center rounded-md px-3 py-1 w-full max-w-xs">
                                                                                <div
                                                                                    class="font-bold text-sm leading-tight">
                                                                                    {{ $labName }}</div>
                                                                                <div class="text-xs leading-tight">(-)
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                            </td>
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


    @endsection
    <script>
        const allSchedules = @json($schedules);
        const bookedSlotsLookup = new Set(@json($bookedSlots));

        // const dateInput= document.getElementById('bookingDate');
        const labSelect = document.getElementById('lab');
        const sessionSelectStart = document.getElementById('session_start');
        const sessionSelectEnd = document.getElementById('session_end');
        const timeStartInput = document.getElementById('time_start');
        const timeEndInput = document.getElementById('time_end');


        function populateSessionDropdowns() {
            const selectedDateString = dateInput.value;
            const selectedLabId = labSelect.value;

            if (!selectedDateString || !selectedLabId) {
                resetAllDropdowns();
                return;
            }

            const selectedDate = new Date(selectedDateString);
            const dayOfWeek = selectedDate.getDay();

            if (dayOfWeek === 6 || dayOfWeek === 0) {
                alert('Pemesanan tidak dapat dilakukan pada hari Sabtu atau Minggu.');
                dateInput.value = '';
                resetAllDropdowns();
                return;
            }

            const dbDayOfWeek = (dayOfWeek === 0) ? 7 : dayOfWeek;

            const potentialSessions = allSchedules.filter(schedule =>
                schedule.day_of_week == dbDayOfWeek
            );

            updateSingleDropdown(sessionSelectStart, potentialSessions, selectedDateString, selectedLabId);
            updateSingleDropdown(sessionSelectEnd, potentialSessions, selectedDateString, selectedLabId);
        }

        function updateSingleDropdown(selectElement, sessions, selectedDate, selectedLabId) {
            selectElement.innerHTML = '';
            if (sessions.length > 0) {
                selectElement.disabled = false;
                const placeholderText = selectElement.id === 'session_start' ? 'Pilih sesi awal' : 'Pilih sesi akhir';
                let defaultOption = new Option(placeholderText, '');
                defaultOption.disabled = true;
                defaultOption.selected = true;
                selectElement.add(defaultOption);

                sessions.forEach(session => {
                    const lookupKey = `${session.id}-${selectedDate}-${selectedLabId}`;
                    const isBooked = bookedSlotsLookup.has(lookupKey);

                    const optionText =
                        `Sesi ${session.session} (${session.start_time.substring(0,5)} - ${session.end_time.substring(0,5)})`;
                    const finalOptionText = isBooked ? `${optionText} (Dipesan)` : optionText;

                    let newOption = new Option(finalOptionText, session.id);
                    if (isBooked) newOption.disabled = true;
                    selectElement.add(newOption);
                });
            } else {
                selectElement.disabled = true;
                selectElement.add(new Option('Tidak ada jadwal sesi di hari ini', ''));
            }
        }

        function resetAllDropdowns() {
            [sessionSelectStart, sessionSelectEnd].forEach(dropdown => {
                dropdown.disabled = true;
                dropdown.innerHTML = '';
                dropdown.add(new Option('Pilih tanggal & lab dulu', ''));
            });
            timeStartInput.value = '';
            timeEndInput.value = '';
        }

        document.getElementById(document.getElementById('dateInput')) {
            const dateInput = document.getElementById('bookingDate');

            if (dateInput) {
                dateInput.addEventListener('change', populateSessionDropdowns);
            } else {
                console.log("error");

            }
            // dateInput.addEventListener('change', populateSessionDropdowns);
        }

        labSelect.addEventListener('change', populateSessionDropdowns);
        sessionSelectStart.addEventListener('change', function() {
            const selectedId = this.value;
            const schedule = allSchedules.find(s => s.id == selectedId);
            timeStartInput.value = schedule ? schedule.start_time : '';
        });

        sessionSelectEnd.addEventListener('change', function() {
            const selectedId = this.value;
            const schedule = allSchedules.find(s => s.id == selectedId);
            timeEndInput.value = schedule ? schedule.end_time : '';
        });

        document.addEventListener('DOMContentLoaded', resetAllDropdowns);



        // Fasilitas & Informasi
        document.addEventListener('DOMContentLoaded', function() {
            // --- DATA ---
            const facilities = [{
                    name: 'Scanning Electron Microscope (SEM)',
                    description: 'Untuk analisis morfologi permukaan dengan resolusi tinggi.',
                    icon: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-primary"><path d="M6 18h8"/><path d="M3 22h18"/><path d="M14 22a7 7 0 1 0 0-14h-1"/><path d="M9 14h2"/><path d="M9 12a2 2 0 0 1-2-2V6h6v4a2 2 0 0 1-2 2Z"/><path d="M12 6V3a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v3"/></svg>`,
                    lab: 'material'
                },
                {
                    name: 'PCR Machine',
                    description: 'Untuk amplifikasi sekuens DNA secara in vitro.',
                    icon: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-primary"><path d="M4 14.5A3.5 3.5 0 0 1 7.5 11H11a3.5 3.5 0 0 1 3.5 3.5v0A3.5 3.5 0 0 1 11 18H7.5A3.5 3.5 0 0 1 4 14.5z"/><path d="M15 4.5A3.5 3.5 0 0 1 18.5 1H22a3.5 3.5 0 0 1 3.5 3.5v0A3.5 3.5 0 0 1 22 8h-3.5a3.5 3.5 0 0 1-3.5-3.5z"/><path d="m15 13 .4-.4a3.5 3.5 0 0 1 5 5l-.4.4"/><path d="m4 5 .4.4a3.5 3.5 0 0 1 5-5l.4-.4"/></svg>`,
                    lab: 'biotek'
                },
                {
                    name: 'Fume Hood',
                    description: 'Lemari asam untuk bekerja dengan bahan kimia berbahaya secara aman.',
                    icon: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-primary"><path d="M12 12c0-2.25 2-4 2-4s-2-1.75-2-4"/><path d="M12 6V5c0-1-1-2-2-2H8c-1 0-2 1-2 2v1"/><path d="M10 20h4"/><path d="M7 20h0c-1.7 0-3-1.3-3-3V10c0-.6.4-1 1-1h8c.6 0 1 .4 1 1v7c0 1.7-1.3 3-3 3h0"/></svg>`,
                    lab: 'material'
                },
                {
                    name: 'Cell Culture Incubator',
                    description: 'Menyediakan lingkungan terkontrol untuk pertumbuhan kultur sel.',
                    icon: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-primary"><path d="M21 2H3v16h18V2z"/><path d="M7 14v-4"/><path d="M12 14v-4"/><path d="M17 14v-4"/><path d="M21 18H3v2h18v-2z"/></svg>`,
                    lab: 'biotek'
                },
                {
                    name: 'High-Performance Computing',
                    description: 'Server untuk komputasi dan analisis data yang kompleks.',
                    icon: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-primary"><rect x="2" y="3" width="20" height="18" rx="2"/><path d="M6 15h12"/><path d="M6 9h4"/><path d="M14 9h4"/></svg>`,
                    lab: 'both'
                },
                {
                    name: 'UV-Vis Spectrophotometer',
                    description: 'Mengukur absorbansi cahaya oleh sampel larutan.',
                    icon: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-primary"><path d="M10 2v7.31"/><path d="M14 9.31V2"/><path d="M8.5 2h7"/><path d="M14 9.31C16.57 10.22 18 12.24 18 15v5a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-5c0-2.76 1.43-4.78 4-5.69Z"/></svg>`,
                    lab: 'both'
                },
            ];
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

        });
    </script>
</body>

</html>
