{{-- filepath: resources/views/public/data-skripsi.blade.php --}}
@extends('layout.main')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
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
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
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
            min-width: 1100px;
        }

        th:nth-child(1), td:nth-child(1) { width: 5%; }
        th:nth-child(2), td:nth-child(2) { width: 16%; }
        th:nth-child(3), td:nth-child(3) { width: 10%; }
        th:nth-child(4), td:nth-child(4) { width: 35%; }
        th:nth-child(5), td:nth-child(5) { width: 12%; }
        th:nth-child(6), td:nth-child(6) { width: 12%; }
        th:nth-child(7), td:nth-child(7) { width: 10%; }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            vertical-align: top;
            word-wrap: break-word;
            overflow-wrap: break-word;
            hyphens: auto;
        }

        th {
            background-color: #f8f9fa;
            font-weight: 600;
            position: sticky;
            top: 0;
            z-index: 10;
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
            flex-wrap: wrap;
            align-items: center;
        }

        .filter-group input, .filter-group select {
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        #searchInput {
            min-width: 350px;
            flex: 1;
            max-width: 500px;
        }

        .filter-group select {
            min-width: 180px;
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

        #topikFilter {
            min-width: 270px;
            max-width: 220px;
            width: 220px;
            max-height: 200px;
            overflow-y: auto;
            scrollbar-width: none;
            -ms-overflow-style: none;
            white-space: nowrap;
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

        #bidangFilter {
            min-width: 150px;
            max-width: 150px;
            width: 150px;
        }

        @media (max-width: 768px) {
            #topikFilter {
                min-width: 100%;
                max-width: 100%;
                width: 100%;
            }
            
            #bidangFilter {
                min-width: 100%;
                max-width: 100%;
                width: 100%;
            }
        }

        .text-truncate {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100%;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: white;
            margin: 8% auto;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .close {
            color: #999;
            float: right;
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
            line-height: 1;
        }

        .close:hover {
            color: #333;
        }

        .modal-header {
            border-bottom: 2px solid #f0f0f0;
            margin-bottom: 20px;
            padding-bottom: 15px;
        }

        .modal-title {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin: 0;
        }

        .detail-row {
            display: flex;
            margin-bottom: 12px;
            padding: 8px 0;
            border-bottom: 1px solid #f5f5f5;
        }

        .detail-row:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        .detail-label {
            font-weight: 600;
            color: #555;
            width: 120px;
            flex-shrink: 0;
            font-size: 14px;
        }

        .detail-value {
            color: #333;
            flex: 1;
            font-size: 14px;
            line-height: 1.4;
        }

        .btn-detail {
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .btn-detail i {
            font-size: 14px;
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
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
            margin-bottom: 1.5rem;
        }

        .btn-form:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.2);
            text-decoration: none;
            color: white;
        }

        @media (max-width: 768px) {
            .filter-group {
                flex-direction: column;
                align-items: stretch;
            }

            #searchInput, .filter-group select {
                min-width: 100%;
            }

            table {
                min-width: 800px;
            }

            .modal-content {
                margin: 10px;
                width: calc(100% - 20px);
                max-height: 90vh;
            }
        }

        .no-translate {
            translate: no;
        }
    </style>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-2">Data Judul Skripsi</h1>
        <p class="text-gray-600 mb-4">Daftar judul skripsi yang telah diinput oleh mahasiswa melalui Google Form.</p>
        
        <a href="https://forms.gle/7DRgvFG4Gutpp3XG7" target="_blank" class="btn-form bg-yellow-600 no-translate">
            <i class="fas fa-edit"></i> Isi Form Judul Skripsi
        </a>

        <div class="filter-group">
            <input type="text" id="searchInput" placeholder="Cari berdasarkan nama, npm, atau judul skripsi..." class="no-translate">
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
                        <th>Judul Skripsi</th>
                        <th>Bidang</th>
                        <th>Topik</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="skripsiTableBody" class="no-translate">
                </tbody>
            </table>
            <p id="noData" class="text-center text-gray-500 py-8 hidden">Tidak ada data yang ditemukan.</p>
        </div>

        <div id="detailModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2 class="text-2xl font-bold mb-6 text-center" style="color: #2c3e50;">
                    <i class="fas fa-clipboard-list"></i> Detail Skripsi
                </h2>
                <div id="modalContent"></div>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sheetUrl = 'https://docs.google.com/spreadsheets/d/e/2PACX-1vT93Fijpr5lPs74U9hFDKwCLUjJMq68bqyhL9_240WcdtNA0mOc-5ZUZlFPGjnd2iDnmg4QmS6Xham2/pub?output=csv';

            const loader = document.getElementById('loader');
            const skripsiTable = document.getElementById('skripsiTable');
            const tableBody = document.getElementById('skripsiTableBody');
            const noData = document.getElementById('noData');
            const searchInput = document.getElementById('searchInput');
            const bidangFilter = document.getElementById('bidangFilter');
            const topikFilter = document.getElementById('topikFilter');
            const modal = document.getElementById('detailModal');
            const modalContent = document.getElementById('modalContent');
            const closeBtn = document.getElementsByClassName('close')[0];

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
                    loader.innerHTML = `<p style="color: red; text-align: center;">❌ Error: ${error.message}</p>`;
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
                        <td class="text-center">${index + 1}</td>
                        <td class="text-truncate" title="${item.nama}">${item.nama}</td>
                        <td class="text-truncate" title="${item.npm}">${item.npm}</td>
                        <td class="text-truncate" title="${item.judul}">${item.judul}</td>
                        <td class="text-truncate" title="${item.bidang}">${item.bidang}</td>
                        <td class="text-truncate" title="${item.topik}">${item.topik}</td>
                        <td class="text-center">
                            <button class="btn-detail bg-yellow-600" onclick="showDetail(${index})" title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
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

            window.showDetail = function(index) {
                const item = currentFilteredData[index];
                
                modalContent.innerHTML = `
                    <div class="modal-header">
                        <h3 class="modal-title">Detail Informasi Skripsi</h3>
                    </div>
                    
                    <div class="detail-row">
                        <div class="detail-label">Nama:</div>
                        <div class="detail-value">${item.nama}</div>
                    </div>
                    
                    <div class="detail-row">
                        <div class="detail-label">NPM:</div>
                        <div class="detail-value">${item.npm}</div>
                    </div>
                    
                    <div class="detail-row">
                        <div class="detail-label">Judul:</div>
                        <div class="detail-value">${item.judul}</div>
                    </div>
                    
                    <div class="detail-row">
                        <div class="detail-label">Bidang:</div>
                        <div class="detail-value">${item.bidang}</div>
                    </div>
                    
                    <div class="detail-row">
                        <div class="detail-label">Topik:</div>
                        <div class="detail-value">${item.topik}</div>
                    </div>
                `;
                
                modal.style.display = 'block';
            }

            closeBtn.onclick = function() {
                modal.style.display = 'none';
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            }

            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape' && modal.style.display === 'block') {
                    modal.style.display = 'none';
                }
            });

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
