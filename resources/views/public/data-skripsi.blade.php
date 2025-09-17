{{-- filepath: resources/views/public/data-skripsi.blade.php --}}
@extends('layout.main')

@section('content')
    <style>
        /* Styling untuk loading spinner dan tampilan tabel */
        .loader {
            border: 8px solid #f3f3f3;
            border-top: 8px solid #3498db;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 2s linear infinite;
            margin: 50px auto;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        thead {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .filter-group {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .filter-group input,
        .filter-group select {
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            min-width: 200px;
        }
    </style>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-2">Data Judul Skripsi</h1>
        <p class="text-gray-600 mb-6">Daftar judul skripsi yang telah diajukan oleh mahasiswa. Data diperbarui secara
            otomatis dari Google Sheets.</p>

        <!-- Filter dan Search -->
        <div class="filter-group">
            <input type="text" id="searchInput" placeholder="Cari berdasarkan nama, npm, atau judul...">
            <select id="bidangFilter">
                <option value="">Semua Bidang</option>
                {{-- Opsi akan diisi oleh JavaScript --}}
            </select>
            <select id="topikFilter">
                <option value="">Semua Topik</option>
                {{-- Opsi akan diisi oleh JavaScript --}}
            </select>
        </div>

        <!-- Kontainer untuk Tabel -->
        <div id="table-container" class="table-container bg-white p-4 rounded-lg shadow">
            <div id="loader" class="loader"></div>
            <table id="skripsiTable" class="hidden">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Mahasiswa</th>
                        <th>NPM</th>
                        <th>Judul Skripsi</th>
                        <th>Bidang</th>
                        <th>Topik</th>
                    </tr>
                </thead>
                <tbody id="skripsiTableBody">
                    {{-- Data akan diisi oleh JavaScript --}}
                </tbody>
            </table>
            <p id="noData" class="text-center text-gray-500 py-8 hidden">Data tidak ditemukan.</p>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // GANTI URL INI dengan URL CSV dari "Publikasikan ke web"
            // const sheetUrl = 'https://docs.google.com/spreadsheets/d/e/2PACX-1vR_gY21pT2aG_1t_gZ3bY4X5c6V7e8F9gH0jK1lM2n3o4P5r6S7t8U9v0W1xY2z_A3b4C5d6E7F8G9/pub?output=csv'; // CONTOH URL YANG BENAR
            const sheetUrl =
                'https://docs.google.com/spreadsheets/d/e/2PACX-1vTTtfLQ-r5GyUggDFpwAMI1UFKRAE9Rv4spI1VVCUBmd0GDDXKJ3RKu5lzxDWWEBb_C-FR-EPWEqtR9/pub?output=csv'; // CONTOH URL YANG BENAR

            const loader = document.getElementById('loader');
            const skripsiTable = document.getElementById('skripsiTable');
            const tableBody = document.getElementById('skripsiTableBody');
            const noData = document.getElementById('noData');
            const searchInput = document.getElementById('searchInput');
            const bidangFilter = document.getElementById('bidangFilter');
            const topikFilter = document.getElementById('topikFilter');

            let allData = []; // Untuk menyimpan data asli dari spreadsheet

            // Fungsi untuk mengambil dan mem-parsing data CSV
            async function fetchData() {
                try {
                    // Menambahkan parameter acak untuk mencegah caching
                    const response = await fetch(`${sheetUrl}&_=${new Date().getTime()}`);
                    if (!response.ok) {
                        throw new Error('Gagal mengambil data. Pastikan URL publikasi CSV sudah benar.');
                    }
                    const csvText = await response.text();

                    const rows = csvText.split('\n').slice(1); // Hilangkan header
                    allData = rows.map(row => {
                        // Split berdasarkan koma, tapi hati-hati jika ada koma di dalam judul
                        const columns = row.match(/(".*?"|[^",]+)(?=\s*,|\s*$)/g) || [];
                        const cleanedColumns = columns.map(item => item.trim().replace(/"/g, ''));

                        // **PERUBAHAN UTAMA DI SINI**
                        // Sesuaikan indeks kolom dengan struktur baru Anda
                        const bidang = cleanedColumns[5] || '';
                        // Topik diambil secara kondisional berdasarkan bidang
                        const topik = bidang.includes('Solusi') ? (cleanedColumns[6] || '') : (
                            cleanedColumns[7] || '');

                        return {
                            nama: cleanedColumns[2] || '',
                            npm: cleanedColumns[3] || '',
                            judul: cleanedColumns[4] || '',
                            bidang: bidang,
                            topik: topik
                        };
                    }).filter(item => item.nama && item.npm); // Filter baris kosong

                    populateFilters();
                    renderTable(allData);

                } catch (error) {
                    console.error('Error:', error);
                    loader.innerText = error.message;
                    loader.style.color = 'red';
                } finally {
                    if (loader) loader.style.display = 'none';
                    if (skripsiTable) skripsiTable.classList.remove('hidden');
                }
            }

            // Fungsi untuk mengisi opsi filter secara dinamis
            function populateFilters() {
                // Hapus opsi lama sebelum mengisi yang baru
                bidangFilter.innerHTML = '<option value="">Semua Bidang</option>';
                topikFilter.innerHTML = '<option value="">Semua Topik</option>';

                const bidangSet = new Set(allData.map(item => item.bidang).filter(Boolean));
                const topikSet = new Set(allData.map(item => item.topik).filter(Boolean));

                bidangSet.forEach(bidang => {
                    const option = document.createElement('option');
                    option.value = bidang;
                    option.textContent = bidang;
                    bidangFilter.appendChild(option);
                });

                topikSet.forEach(topik => {
                    const option = document.createElement('option');
                    option.value = topik;
                    option.textContent = topik;
                    topikFilter.appendChild(option);
                });
            }

            // Fungsi untuk menampilkan data ke dalam tabel
            function renderTable(data) {
                tableBody.innerHTML = '';
                if (data.length === 0) {
                    noData.classList.remove('hidden');
                    skripsiTable.classList.add('hidden');
                    return;
                }

                noData.classList.add('hidden');
                skripsiTable.classList.remove('hidden');

                data.forEach((item, index) => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                <td>${index + 1}</td>
                <td>${item.nama}</td>
                <td>${item.npm}</td>
                <td>${item.judul}</td>
                <td>${item.bidang}</td>
                <td>${item.topik}</td>
            `;
                    tableBody.appendChild(row);
                });
            }

            // Fungsi untuk memfilter data dan me-render ulang tabel
            function applyFilters() {
                const searchTerm = searchInput.value.toLowerCase();
                const selectedBidang = bidangFilter.value;
                const selectedTopik = topikFilter.value;

                const filteredData = allData.filter(item => {
                    const matchesSearch = (
                        (item.nama && item.nama.toLowerCase().includes(searchTerm)) ||
                        (item.npm && item.npm.toLowerCase().includes(searchTerm)) ||
                        (item.judul && item.judul.toLowerCase().includes(searchTerm))
                    );
                    const matchesBidang = !selectedBidang || item.bidang === selectedBidang;
                    const matchesTopik = !selectedTopik || item.topik === selectedTopik;

                    return matchesSearch && matchesBidang && matchesTopik;
                });

                renderTable(filteredData);
            }

            // Tambahkan event listener untuk setiap filter
            searchInput.addEventListener('keyup', applyFilters);
            bidangFilter.addEventListener('change', applyFilters);
            topikFilter.addEventListener('change', applyFilters);

            // Mulai proses dengan mengambil data
            fetchData();
        });
    </script>
@endsection
