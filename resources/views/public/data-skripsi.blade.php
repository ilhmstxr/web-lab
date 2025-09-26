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
            let currentPage = 1;
            const itemsPerPage = 50;

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
                    console.log('Processing date:', tanggalString); // Debug log
                    
                    // Handle format M/D/YYYY H:MM:SS or MM/DD/YYYY HH:MM:SS
                    if (tanggalString.includes('/')) {
                        // Split tanggal dan waktu
                        const [tanggalPart, waktuPart] = tanggalString.split(' ');
                        
                        if (tanggalPart) {
                            const dateParts = tanggalPart.split('/');

                            // Handle both M/D/YYYY and MM/DD/YYYY formats
                            if (dateParts.length === 3) {
                                const month = parseInt(dateParts[0], 10);
                                const day = parseInt(dateParts[1], 10);
                                const year = parseInt(dateParts[2], 10);
                                
                                console.log('Parsed:', { month, day, year }); // Debug log
                                
                                // Validate date components
                                if (year >= 1900 && year <= 2100 && 
                                    month >= 1 && month <= 12 && 
                                    day >= 1 && day <= 31) {
                                    
                                    // Create date object (month is 0-indexed in JS)
                                    const date = new Date(year, month - 1, day);
                                    
                                    // Verify the date is valid
                                    if (date.getFullYear() === year && 
                                        date.getMonth() === month - 1 && 
                                        date.getDate() === day) {
                                        
                                        const options = {
                                            year: 'numeric',
                                            month: 'short',
                                            day: 'numeric'
                                        };
                                        
                                        const formatted = date.toLocaleDateString('id-ID', options);
                                        console.log('Formatted result:', formatted); // Debug log
                                        return formatted;
                                    }
                                }
                            }
                        }
                    }

                    // Fallback: try parsing as standard date
                    const date = new Date(tanggalString);
                    if (!isNaN(date.getTime())) {
                        const options = {
                            year: 'numeric',
                            month: 'short',
                            day: 'numeric'
                        };
                        return date.toLocaleDateString('id-ID', options);
                    }

                    // If all parsing fails, return original string
                    console.log('Date parsing failed, returning original:', tanggalString);
                    return tanggalString;
                    
                } catch (error) {
                    console.error('Error formatting date:', error);
                    return tanggalString;
                }
            }

            function parseDateForSort(tanggalString) {
                if (!tanggalString) return new Date(0); // Return epoch time for empty dates

                try {
                    // Handle format M/D/YYYY H:MM:SS or MM/DD/YYYY HH:MM:SS
                    if (tanggalString.includes('/')) {
                        const [tanggalPart, waktuPart] = tanggalString.split(' ');
                        
                        if (tanggalPart) {
                            const dateParts = tanggalPart.split('/');
                            
                            if (dateParts.length === 3) {
                                const month = parseInt(dateParts[0], 10);
                                const day = parseInt(dateParts[1], 10);
                                const year = parseInt(dateParts[2], 10);
                                
                                // Validate date components
                                if (year >= 1900 && year <= 2100 && 
                                    month >= 1 && month <= 12 && 
                                    day >= 1 && day <= 31) {
                                    
                                    // Create date object (month is 0-indexed in JS)
                                    const date = new Date(year, month - 1, day);
                                    
                                    // If there's time part, add it
                                    if (waktuPart) {
                                        const [jam, menit, detik] = waktuPart.split(':').map(num => parseInt(num, 10));
                                        if (!isNaN(jam)) date.setHours(jam);
                                        if (!isNaN(menit)) date.setMinutes(menit);
                                        if (!isNaN(detik)) date.setSeconds(detik);
                                    }
                                    
                                    // Verify the date is valid
                                    if (!isNaN(date.getTime())) {
                                        return date;
                                    }
                                }
                            }
                        }
                    }

                    // Fallback: try parsing as standard date
                    const date = new Date(tanggalString);
                    if (!isNaN(date.getTime())) {
                        return date;
                    }

                    // If all parsing fails, return epoch time
                    return new Date(0);
                    
                } catch (error) {
                    console.error('Error parsing date for sort:', error);
                    return new Date(0);
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

                    const dataRows = rows.slice(1); // Skip header row

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

                        const tanggalString = (columns[0] || '').trim();

                        return {
                            tanggal: tanggalString,
                            nama: (columns[2] || '').trim(),
                            npm: (columns[3] || '').trim(),
                            judul: (columns[4] || '').trim(),
                            bidang: bidang,
                            topik: topik,
                            sortDate: parseDateForSort(tanggalString),
                            hasDate: tanggalString !== ''
                        };
                    }).filter(item => item.nama && item.npm);

                    // Sort by date: newest first, then entries without dates at the bottom
                    allData.sort((a, b) => {
                        // If both have dates, sort by date (newest first)
                        if (a.hasDate && b.hasDate) {
                            return b.sortDate - a.sortDate;
                        }
                        // If only a has date, a comes first
                        if (a.hasDate && !b.hasDate) {
                            return -1;
                        }
                        // If only b has date, b comes first
                        if (!a.hasDate && b.hasDate) {
                            return 1;
                        }
                        // If neither has date, maintain original order
                        return 0;
                    });

                    console.log('Processed and sorted data:', allData);
                    console.log('First 3 items after sorting:', allData.slice(0, 3));

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
                
                // Remove existing pagination
                const existingPagination = document.getElementById('pagination');
                if (existingPagination) {
                    existingPagination.remove();
                }

                skripsiTable.classList.remove('hidden');

                if (data.length === 0) {
                    noData.classList.remove('hidden');
                    return;
                }

                noData.classList.add('hidden');

                // Calculate pagination
                const totalPages = Math.ceil(data.length / itemsPerPage);
                const startIndex = (currentPage - 1) * itemsPerPage;
                const endIndex = Math.min(startIndex + itemsPerPage, data.length);
                const paginatedData = data.slice(startIndex, endIndex);

                // Render table rows
                paginatedData.forEach((item, index) => {
                    const row = document.createElement('tr');
                    const globalIndex = startIndex + index + 1;

                    row.innerHTML = `
                        <td class="text-center">${globalIndex}.</td>
                        <td class="text-truncate" title="${item.nama}">${item.nama}</td>
                        <td class="text-truncate" title="${item.npm}">${item.npm}</td>
                        <td class="text-truncate" title="${item.judul}">${item.judul}</td>
                        <td class="text-center" title="${item.tanggal}">${formatTanggal(item.tanggal)}</td>
                    `;
                    tableBody.appendChild(row);
                });

                // Render pagination
                renderPagination(totalPages, data.length);
            }

            function renderPagination(totalPages, totalItems) {
                if (totalPages <= 1) return;

                const paginationContainer = document.createElement('div');
                paginationContainer.id = 'pagination';
                paginationContainer.className = 'pagination-container mt-4';
                
                // Add pagination styles
                const style = document.createElement('style');
                style.textContent = `
                    .pagination-container {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        gap: 0.5rem;
                        margin-top: 1.5rem;
                        flex-wrap: wrap;
                        padding: 1rem 0;
                    }
                    .pagination-btn {
                        padding: 10px 15px;
                        border: 1px solid #ddd;
                        background: white;
                        color: #333;
                        text-decoration: none;
                        border-radius: 6px;
                        cursor: pointer;
                        font-size: 14px;
                        font-weight: 500;
                        transition: all 0.3s ease;
                        min-width: 44px;
                        text-align: center;
                    }
                    .pagination-btn:hover {
                        background: #f0f0f0;
                        color: #333;
                        text-decoration: none;
                        border-color: #bbb;
                    }
                    .pagination-btn.active {
                        background: #4f46e5;
                        color: white;
                        border-color: #4f46e5;
                    }
                    .pagination-btn.disabled {
                        opacity: 0.5;
                        cursor: not-allowed;
                        pointer-events: none;
                    }
                    .pagination-info {
                        margin: 0 1rem;
                        color: #666;
                        font-size: 14px;
                        font-weight: 500;
                    }
                    .pagination-dots {
                        padding: 10px 5px;
                        color: #666;
                    }
                `;
                
                if (!document.getElementById('pagination-styles')) {
                    style.id = 'pagination-styles';
                    document.head.appendChild(style);
                }

                // Previous button
                const prevBtn = document.createElement('button');
                prevBtn.className = `pagination-btn ${currentPage === 1 ? 'disabled' : ''}`;
                prevBtn.innerHTML = '← Sebelumnya';
                prevBtn.onclick = () => {
                    if (currentPage > 1) {
                        currentPage--;
                        renderTable(currentFilteredData);
                    }
                };

                // Page numbers container
                const pageContainer = document.createElement('div');
                pageContainer.style.display = 'flex';
                pageContainer.style.gap = '0.25rem';

                // Show page numbers with smart pagination
                const startPage = Math.max(1, currentPage - 2);
                const endPage = Math.min(totalPages, currentPage + 2);

                // First page
                if (startPage > 1) {
                    const firstBtn = document.createElement('button');
                    firstBtn.className = 'pagination-btn';
                    firstBtn.textContent = '1';
                    firstBtn.onclick = () => {
                        currentPage = 1;
                        renderTable(currentFilteredData);
                    };
                    pageContainer.appendChild(firstBtn);

                    if (startPage > 2) {
                        const dots = document.createElement('span');
                        dots.className = 'pagination-dots';
                        dots.textContent = '...';
                        pageContainer.appendChild(dots);
                    }
                }

                // Page numbers around current page
                for (let i = startPage; i <= endPage; i++) {
                    const pageBtn = document.createElement('button');
                    pageBtn.className = `pagination-btn ${i === currentPage ? 'active' : ''}`;
                    pageBtn.textContent = i;
                    pageBtn.onclick = () => {
                        currentPage = i;
                        renderTable(currentFilteredData);
                    };
                    pageContainer.appendChild(pageBtn);
                }

                // Last page
                if (endPage < totalPages) {
                    if (endPage < totalPages - 1) {
                        const dots = document.createElement('span');
                        dots.className = 'pagination-dots';
                        dots.textContent = '...';
                        pageContainer.appendChild(dots);
                    }

                    const lastBtn = document.createElement('button');
                    lastBtn.className = 'pagination-btn';
                    lastBtn.textContent = totalPages;
                    lastBtn.onclick = () => {
                        currentPage = totalPages;
                        renderTable(currentFilteredData);
                    };
                    pageContainer.appendChild(lastBtn);
                }

                // Next button
                const nextBtn = document.createElement('button');
                nextBtn.className = `pagination-btn ${currentPage === totalPages ? 'disabled' : ''}`;
                nextBtn.innerHTML = 'Selanjutnya →';
                nextBtn.onclick = () => {
                    if (currentPage < totalPages) {
                        currentPage++;
                        renderTable(currentFilteredData);
                    }
                };

                // Info text
                const startItem = (currentPage - 1) * itemsPerPage + 1;
                const endItem = Math.min(currentPage * itemsPerPage, totalItems);
                const info = document.createElement('div');
                info.className = 'pagination-info';
                info.innerHTML = `Menampilkan <strong>${startItem}-${endItem}</strong> dari <strong>${totalItems}</strong> data`;

                // Append all elements
                paginationContainer.appendChild(prevBtn);
                paginationContainer.appendChild(pageContainer);
                paginationContainer.appendChild(nextBtn);
                
                // Add info on new line
                const infoContainer = document.createElement('div');
                infoContainer.style.width = '100%';
                infoContainer.style.textAlign = 'center';
                infoContainer.style.marginTop = '1rem';
                infoContainer.appendChild(info);
                
                paginationContainer.appendChild(infoContainer);

                // Insert after table container
                const tableContainer = document.getElementById('table-container');
                tableContainer.parentNode.insertBefore(paginationContainer, tableContainer.nextSibling);
            }

            function applyFilters() {
                currentPage = 1; // Reset to first page when filtering
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
