{{-- filepath: resources/views/public/data-skripsi.blade.php --}}
@extends('layout.main')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
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
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 1rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            min-width: 900px;
        }

        th:nth-child(1),
        td:nth-child(1) {
            width: 6%;
        }

        th:nth-child(2),
        td:nth-child(2) {
            width: 25%;
        }

        th:nth-child(3),
        td:nth-child(3) {
            width: 12%;
        }

        th:nth-child(4),
        td:nth-child(4) {
            width: 45%;
        }

        th:nth-child(5),
        td:nth-child(5) {
            width: 12%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            vertical-align: top;
            word-wrap: break-word;
            overflow-wrap: break-word;
            hyphens: auto;
        }

        th {
            text-align: center;
            background-color: #f8f9fa;
            font-weight: 600;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        th:nth-child(1),
        td:nth-child(1) {
            text-align: center;
        }

        th:nth-child(5),
        td:nth-child(5) {
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e8f4f8;
        }

        .filter-group {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            flex-wrap: nowrap;
            align-items: center;
            width: 100%;
        }

        .filter-group input,
        .filter-group select {
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        #searchInput {
            flex: 5;
            min-width: 0;
        }

        .filter-group select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            overflow: hidden;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .filter-group select::-webkit-scrollbar {
            display: none;
        }

        #bidangFilter {
            flex: 1.5;
            min-width: 0;
        }

        #topikFilter {
            flex: 3.5;
            min-width: 0;
            max-height: 200px;
            overflow-y: auto;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        #topikFilter::-webkit-scrollbar {
            display: none;
        }

        #topikFilter option {
            padding: 8px 12px;
            background: white;
            color: #333;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            min-height: 36px;
            line-height: 1.4;
        }

        #topikFilter option:hover {
            background: #f0f0f0;
        }

        @media (max-width: 768px) {
            .filter-group {
                flex-direction: column;
                align-items: stretch;
            }

            #searchInput,
            #bidangFilter,
            #topikFilter {
                flex: none;
                width: 100%;
                min-width: 100%;
            }

            table {
                min-width: 700px;
            }
        }

        .text-truncate {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100%;
        }

        .btn-form {
            display: inline-block;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
        }

        .btn-form:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            text-decoration: none;
            color: white;
        }

        @media (max-width: 768px) {
            .filter-group {
                flex-direction: column;
                align-items: stretch;
            }

            #searchInput,
            .filter-group select {
                min-width: 100%;
            }

            table {
                min-width: 700px;
            }
        }

        .no-translate {
            translate: no;
        }

        #skripsiTable {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            /* kolom punya lebar fix dan teks bisa wrap */
        }

        #skripsiTable th,
        #skripsiTable td {
            border: 1px solid #ddd;
            padding: 8px;
            word-wrap: break-word;
            /* teks panjang otomatis turun */
            white-space: normal;
            /* teks boleh pecah baris */
            text-align: left;
        }

        #skripsiTable th {
            background-color: #f5f5f5;
        }
    </style>

    <main class="flex-1 py-12 md:py-24 lg:py-32">
        <div class="container mx-auto px-4 md:px-6">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold tracking-tighter sm:text-5xl text-primary font-headline">
                    Data Judul Proposal Skripsi
                </h1>
                <p class="max-w-[800px] mx-auto text-foreground-80 md:text-xl mt-4">
                    Daftar judul proposal skripsi yang telah dikirimkan oleh mahasiswa melalui Google Form.
                </p>
            </div>

            <div class="text-center mb-8">
                <a href="https://forms.gle/7DRgvFG4Gutpp3XG7" target="_blank" class="btn-form bg-yellow-600 no-translate">
                    <i class="fas fa-edit"></i> Isi Form Judul Proposal Skripsi
                </a>
            </div>

            <div class="filter-group">
                <input type="text" id="searchInput" placeholder="Cari berdasarkan nama, npm, atau judul skripsi..."
                    class="no-translate">
                <select id="bidangFilter" class="no-translate">
                    <option value="">Semua Bidang</option>
                </select>
                <select id="topikFilter" class="no-translate">
                    <option value="">Semua Topik</option>
                </select>
            </div>

            <div id="table-container" class="table-container">
                <div id="loader" class="loader"></div>
                <table id="skripsiTable" class="hidden no-translate">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mahasiswa</th>
                            <th>NPM</th>
                            <th>Judul Proposal Skripsi</th>
                            <th class="text-center">Tanggal Input</th>
                        </tr>
                    </thead>
                    <tbody id="skripsiTableBody" class="no-translate">
                    </tbody>
                </table>
                <p id="noData" class="text-center text-gray-500 py-8 hidden">Tidak ada data yang ditemukan.</p>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sheetUrl =
                'https://docs.google.com/spreadsheets/d/e/2PACX-1vT93Fijpr5lPs74U9hFDKwCLUjJMq68bqyhL9_240WcdtNA0mOc-5ZUZlFPGjnd2iDnmg4QmS6Xham2/pub?gid=0&single=true&output=csv';

            const loader = document.getElementById('loader');
            const skripsiTable = document.getElementById('skripsiTable');
            const tableBody = document.getElementById('skripsiTableBody');
            const noData = document.getElementById('noData');
            const searchInput = document.getElementById('searchInput');
            const bidangFilter = document.getElementById('bidangFilter');
            const topikFilter = document.getElementById('topikFilter');

            let allData = [];
            let currentFilteredData = [];


            const topikData = {
                'Solusi': [
                    'Pengembangan Aplikasi',
                    'Data Mining',
                    'UI/UX',
                    'Testing',
                    'SPK',
                    'Forecast',
                    'Pemodelan & Simulasi',
                    'Jaringan',
                    'IOT',
                    'ERP',
                    'Manajemen Proses Bisnis'
                ],
                'MSI': [
                    'Perencanaan dan Strategi TI',
                    'Audit dan Tata Kelola TI',
                    'Pengembangan dan Evaluasi Sistem',
                    'Manajemen Proyek TI',
                    'UI/UX dan Pengalaman Pengguna',
                    'Operasional TI dan Infrastruktur',
                    'Manajemen Data dan Informasi',
                    'Adopsi Teknologi dan Inovasi',
                    'Analisis Sistem dan Pemodelan Dinamik'
                ]
            };

            function populateFilters() {
                bidangFilter.innerHTML = '<option value="">Semua Bidang</option>';

                const bidangOptions = ['Solusi', 'MSI'];
                bidangOptions.forEach(bidang => {
                    const option = document.createElement('option');
                    option.value = bidang;
                    option.textContent = bidang;
                    option.classList.add('no-translate');
                    bidangFilter.appendChild(option);
                });

                populateTopikFilter('');
            }

            function populateTopikFilter(selectedBidang) {
                topikFilter.innerHTML = '<option value="">Semua Topik</option>';

                if (selectedBidang && topikData[selectedBidang]) {
                    topikData[selectedBidang].forEach(topik => {
                        const option = document.createElement('option');
                        option.value = topik;
                        option.textContent = topik;
                        option.classList.add('no-translate');
                        topikFilter.appendChild(option);
                    });
                } else {
                    const allTopiks = [...topikData.Solusi, ...topikData.MSI];
                    const uniqueTopiks = [...new Set(allTopiks)].sort();

                    uniqueTopiks.forEach(topik => {
                        const option = document.createElement('option');
                        option.value = topik;
                        option.textContent = topik;
                        option.classList.add('no-translate');
                        topikFilter.appendChild(option);
                    });
                }
            }

            function formatTanggal(tanggalString) {
                if (!tanggalString) return '-';

                try {
                    // Handle format DD/MM/YYYY HH:MM:SS
                    if (tanggalString.includes('/')) {
                        // Split tanggal dan waktu
                        const [tanggalPart] = tanggalString.split(' ');
                        const [day, month, year] = tanggalPart.split('/');

                        // Buat date object dari format DD/MM/YYYY
                        const date = new Date(year, month - 1, day);

                        if (isNaN(date.getTime())) return tanggalString;

                        const options = {
                            year: 'numeric',
                            month: 'short',
                            day: 'numeric'
                        };
                        return date.toLocaleDateString('id-ID', options);
                    }

                    // Fallback untuk format lain
                    const date = new Date(tanggalString);
                    if (isNaN(date.getTime())) return tanggalString;

                    const options = {
                        year: 'numeric',
                        month: 'short',
                        day: 'numeric'
                    };
                    return date.toLocaleDateString('id-ID', options);
                } catch (error) {
                    return tanggalString;
                }
            }

            async function fetchData() {
                try {
                    console.log('Fetching data from:', sheetUrl);
                    const response = await fetch(`${sheetUrl}&_=${new Date().getTime()}`);

                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }

                    const csvText = await response.text();
                    console.log('CSV data received:', csvText.substring(0, 200) + '...');

                    const rows = csvText.split('\n').filter(row => row.trim());
                    console.log('Total rows:', rows.length);

                    const dataRows = rows.slice(1);

                    allData = dataRows.map((row, index) => {
                        const columns = parseCSVRow(row);
                        console.log(`Row ${index}:`, columns);

                        const bidang = (columns[5] || '').trim();
                        let topik = '';

                        if (bidang.toLowerCase().includes('solusi')) {
                            topik = (columns[6] || '').trim();
                        } else if (bidang.toLowerCase().includes('msi')) {
                            topik = (columns[7] || '').trim();
                        } else {
                            topik = (columns[6] || columns[7] || '').trim();
                        }

                        return {
                            tanggal: (columns[0] || '').trim(),
                            nama: (columns[2] || '').trim(),
                            npm: (columns[3] || '').trim(),
                            judul: (columns[4] || '').trim(),
                            bidang: bidang,
                            topik: topik
                        };
                    }).filter(item => item.nama && item.npm);

                    console.log('Processed data:', allData);

                    populateFilters();

                    renderTable(allData);

                } catch (error) {
                    console.error('Error fetching data:', error);
                    loader.innerHTML =
                        `<p style="color: red; text-align: center;">❌ Error: ${error.message}</p>`;
                } finally {
                    loader.style.display = 'none';
                    skripsiTable.classList.remove('hidden');
                }
            }

            function parseCSVRow(row) {
                const result = [];
                let current = '';
                let inQuotes = false;

                for (let i = 0; i < row.length; i++) {
                    const char = row[i];

                    if (char === '"') {
                        inQuotes = !inQuotes;
                    } else if (char === ',' && !inQuotes) {
                        result.push(current.trim());
                        current = '';
                    } else {
                        current += char;
                    }
                }

                result.push(current.trim());
                return result;
            }

            function renderTable(data) {
                currentFilteredData = data;
                tableBody.innerHTML = '';

                skripsiTable.classList.remove('hidden');

                if (data.length === 0) {
                    noData.classList.remove('hidden');
                    const emptyRow = document.createElement('tr');

                    const hasSearchOrFilter = searchInput.value.trim() !== '' ||
                        bidangFilter.value !== '' ||
                        topikFilter.value !== '';

                    emptyRow.innerHTML = ``;
                    tableBody.appendChild(emptyRow);
                    return;
                }

                noData.classList.add('hidden');

                data.forEach((item, index) => {
                    const row = document.createElement('tr');

                    row.innerHTML = `
                        <td class="text-center">${index + 1}.</td>
                        <td class="text-truncate" title="${item.nama}">${item.nama}</td>
                        <td class="text-truncate" title="${item.npm}">${item.npm}</td>
                        <td class="text-truncate" title="${item.judul}">${item.judul}</td>
                        <td class="text-center" title="${item.tanggal}">${formatTanggal(item.tanggal)}</td>
                    `;
                    tableBody.appendChild(row);
                });
            }

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

                    let matchesBidang = true;
                    if (selectedBidang) {
                        if (selectedBidang === 'Solusi') {
                            matchesBidang = item.bidang.toLowerCase().includes('solusi');
                        } else if (selectedBidang === 'MSI') {
                            matchesBidang = item.bidang.toLowerCase().includes('msi');
                        }
                    }

                    const matchesTopik = !selectedTopik || item.topik === selectedTopik;

                    return matchesSearch && matchesBidang && matchesTopik;
                });

                renderTable(filteredData);
            }

            bidangFilter.addEventListener('change', function() {
                const selectedBidang = this.value;
                topikFilter.value = '';
                populateTopikFilter(selectedBidang);
                applyFilters();
            });

            searchInput.addEventListener('keyup', applyFilters);
            topikFilter.addEventListener('change', applyFilters);

            fetchData();
        });
    </script>
@endsection
