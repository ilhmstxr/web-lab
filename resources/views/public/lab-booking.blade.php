<style>
    /* Custom styles to match the theme */
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f7fafc;
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
    
    /* Loading Spinner */
    .loader {
        border: 4px solid #f3f3f3;
        border-radius: 50%;
        border-top: 4px solid #4f46e5;
        width: 24px;
        height: 24px;
        -webkit-animation: spin 1s linear infinite; /* Safari */
        animation: spin 1s linear infinite;
        display: inline-block;
        vertical-align: middle;
        margin-right: 8px;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
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

                <div class="grid lg:grid-cols-2 gap-12">
                    <!-- Left Column: Booking Form -->
                    <div class="rounded-lg border bg-white shadow-sm">
                        <div class="p-6">
                            <h3 class="text-2xl font-bold mb-1">Formulir Pemesanan</h3>
                            <p class="text-foreground-80 mb-6">Isi formulir untuk memesan jadwal lab.</p>

                            <form id="bookingForm" class="space-y-4">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                    <input type="text" id="name" name="name" placeholder="Nama Anda"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border"
                                        required>
                                </div>

                                <div>
                                    <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Peran</label>
                                    <select id="role" name="role"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border"
                                        required>
                                        <option value="" disabled selected>Pilih Peran</option>
                                        <option value="Dosen">Dosen</option>
                                        <option value="Mahasiswa">Mahasiswa</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="purpose" class="block text-sm font-medium text-gray-700 mb-1">Tujuan</label>
                                    <input type="text" id="purpose" name="purpose" placeholder="Contoh: Praktikum, Penelitian, dll"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border"
                                        required>
                                </div>

                                <div>
                                    <label for="lab" class="block text-sm font-medium text-gray-700 mb-1">Laboratorium</label>
                                    <select id="lab" name="lab"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border"
                                        required>
                                        <option value="" disabled selected>Pilih Laboratorium</option>
                                        @foreach ($labNames as $labName)
                                            <option value="{{ $labName }}">{{ $labName }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Penggunaan</label>
                                    <input type="date" id="date" name="date"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border"
                                        required>
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="startTime" class="block text-sm font-medium text-gray-700 mb-1">Jam Mulai</label>
                                        <input type="time" id="startTime" name="startTime"
                                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border"
                                            required>
                                    </div>
                                    <div>
                                        <label for="endTime" class="block text-sm font-medium text-gray-700 mb-1">Jam Akhir</label>
                                        <input type="time" id="endTime" name="endTime"
                                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border"
                                            required>
                                    </div>
                                </div>

                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi (Opsional)</label>
                                    <textarea id="description" name="description" rows="3"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border"
                                        placeholder="Tambahan informasi..."></textarea>
                                </div>

                                <div id="formMessage" class="hidden p-3 rounded text-sm mb-4"></div>

                                <button type="submit" id="submitBtn"
                                    class="w-full inline-flex items-center justify-center rounded-md bg-accent px-4 py-2 text-sm font-medium text-accent-foreground shadow-sm transition-colors hover:bg-accent/90">
                                    Kirim Permintaan
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Right Column: Google Calendar Embed -->
                    <div class="rounded-lg border bg-white shadow-sm flex flex-col">
                        <div class="p-4 border-b">
                            <h3 class="text-xl font-bold">Kalender Jadwal Lab</h3>
                        </div>
                        <div class="flex-1 bg-gray-50 p-2">
                            <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-4">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-blue-700">
                                            Catatan: Jika ingin mengakses detail penggunaan Laboratorium, silakan login menggunakan akun UPN. 
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- GOOGLE CALENDAR EMBED START -->
                            <!-- Ganti src di bawah ini dengan URL Embed Calendar Anda -->
                            <iframe 
                                src="https://calendar.google.com/calendar/embed?height=600&wkst=2&ctz=Asia%2FJakarta&showPrint=0&hl=id&showCalendars=0&src=Y19mOTAyOWU1NGFkZjg1YjJlMDhmMzY1YTNmYjdiYmZjMGY5Y2M5NDQyNzlkNzk1NDU4NDJiYTkwZjMwMTc2NWVmQGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20&src=aWQuaW5kb25lc2lhbiNob2xpZGF5QGdyb3VwLnYuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&src=ZW4uaW5kb25lc2lhbiNob2xpZGF5QGdyb3VwLnYuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&color=%237986cb&color=%230b8043&color=%230b8043" 
                                style="border: 0" 
                                width="100%" 
                                height="600" 
                                frameborder="0" 
                                scrolling="no">
                            </iframe>
                            <!-- GOOGLE CALENDAR EMBED END -->
                        </div>
                    </div>
                </div>
            </div>
        </main>

    @endsection

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('bookingForm');
            const submitBtn = document.getElementById('submitBtn');
            const formMessage = document.getElementById('formMessage');

            // GANTI URL INI DENGAN URL WEB APP GOOGLE APPS SCRIPT ANDA
            const SCRIPT_URL = 'https://script.google.com/macros/s/AKfycbzP65E0tKrBLSzHiz-0cpUmF_c6DigfHFSGXDPLdYnqLb5_IeFpsY8w7i_i3dJO0PM/exec'; 

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                // Validation check removed as user has configured the URL

                // UI Loading State
                const originalBtnText = submitBtn.innerText;
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span class="loader"></span> Mengirim...';
                formMessage.classList.add('hidden');

                // Collect Data
                const formData = new FormData(form);
                const data = Object.fromEntries(formData.entries());

                // Send to Google Apps Script
                fetch(SCRIPT_URL, {
                    method: 'POST',
                    // Hapus mode: 'no-cors' agar kita bisa membaca response JSON (untuk validasi bentrok)
                    // Pastikan Script dideploy sebagai "Anyone" agar tidak kena CORS policy ketat.
                    body: JSON.stringify(data)
                })
                .then(response => response.json()) // Parse JSON response
                .then(result => {
                    if (result.result === 'success') {
                        showMessage('Permintaan berhasil dikirim! Jadwal tercatat.', 'success');
                        form.reset();
                    } else {
                        // Tampilkan pesan error dari script (misal: Jadwal bentrok)
                        showMessage(result.message || 'Terjadi kesalahan validasi.', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Fallback jika terjadi error CORS atau network (biasanya karena script belum dideploy benar)
                    showMessage('Terjadi kesalahan. Pastikan URL Script benar dan dideploy sebagai "Anyone".', 'error');
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    submitBtn.innerText = originalBtnText;
                });
            });

            function showMessage(msg, type) {
                formMessage.innerText = msg;
                formMessage.classList.remove('hidden', 'bg-red-100', 'text-red-700', 'bg-green-100', 'text-green-700');
                
                if (type === 'error') {
                    formMessage.classList.add('bg-red-100', 'text-red-700');
                } else {
                    formMessage.classList.add('bg-green-100', 'text-green-700');
                }
            }
        });
    </script>
</body>
</html>
