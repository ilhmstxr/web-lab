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
        // JavaScript untuk fungsionalitas form, tabs, dan toast akan ditempatkan di sini
    </script>
</body>

</html>
