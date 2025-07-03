<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOP Laboratorium - LabConnect</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- jsPDF Library for PDF Generation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        /* Custom styles to match the theme */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb; /* Lighter Gray Background */
            color: #1a202c;
        }
        .font-headline {
            font-weight: 800;
            letter-spacing: -0.025em;
        }
        .text-primary {
            color: #4f46e5;
        }
        .bg-primary {
            background-color: #4f46e5;
        }
        .text-primary-foreground {
            color: #ffffff;
        }
        .text-foreground-80 {
            color: #4a5568;
        }
        .text-muted-foreground {
            color: #6b7280;
        }
        .accordion-content {
            overflow: hidden;
            transition: max-height 0.3s ease-in-out;
            max-height: 0;
        }
        .accordion-trigger svg {
            transition: transform 0.3s ease-in-out;
        }
    </style>
</head>
<body class="antialiased flex flex-col min-h-screen">

    <!-- Header & Navigation -->
    <header class="bg-white/80 backdrop-blur-md sticky top-0 z-40 border-b border-gray-200">
        <div class="container mx-auto px-4 md:px-6">
            <nav class="flex items-center justify-between h-16">
                <a href="#" class="text-xl font-bold text-primary">LabConnect</a>
                <div>
                    <a href="research-exploration-page.html" class="inline-flex items-center justify-center rounded-md bg-transparent text-primary px-4 py-2 text-sm font-medium border border-primary transition-colors hover:bg-primary/10">
                        Eksplorasi Riset
                    </a>
                </div>
            </nav>
        </div>
    </header>
<body class="bg-white text-gray-800">
    <div class="flex flex-col min-h-screen">

    <main class="flex-1 py-12 md:py-24">
        <div class="container mx-auto px-4 md:px-6">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold tracking-tighter sm:text-5xl text-primary font-headline">
                    Standar Operasional Prosedur (SOP)
                </h1>
                <p class="max-w-[700px] mx-auto text-foreground-80 md:text-xl mt-4">
                    Panduan penting untuk memastikan keselamatan, efisiensi, dan integritas penelitian di laboratorium kami.
                </p>
            </div>

            <div class="max-w-4xl mx-auto space-y-8">
                <!-- Lab Selection Buttons -->
                <div class="flex justify-center gap-4 mb-8">
                    <button id="select-solusi-btn" class="inline-flex items-center justify-center rounded-md bg-blue-500 px-6 py-3 text-sm font-medium text-white shadow-sm transition-colors hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        SOP Lab Solusi
                    </button>
                    <button id="select-msi-btn" class="inline-flex items-center justify-center rounded-md bg-gray-300 px-6 py-3 text-sm font-medium text-gray-800 shadow-sm transition-colors hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                        SOP Lab MSI
                    </button>
                </div>

                <!-- Download SOP Card -->
                <div class="rounded-lg border bg-white shadow-sm p-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-primary flex-shrink-0"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><line x1="10" x2="8" y1="9" y2="9"/></svg>
                        <div>
                            <h2 class="text-lg font-semibold">Dokumen SOP Laboratorium <span id="current-lab-name">Solusi</span></h2>
                            <p class="text-sm text-muted-foreground">Setiap pengguna laboratorium wajib memahami dan mematuhi SOP yang berlaku.</p>
                        </div>
                    </div>
                    <button id="downloadPdfBtn" class="w-full sm:w-auto inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-primary-foreground shadow-sm transition-colors hover:bg-primary/90">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                        Unduh PDF
                    </button>
                </div>

                <!-- Accordion Container -->
                <div id="sop-accordion" class="space-y-2">
                    <!-- Accordion items will be rendered here by JavaScript -->
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
        document.addEventListener('DOMContentLoaded', function () {
            const sopAccordion = document.getElementById('sop-accordion');
            const downloadPdfBtn = document.getElementById('downloadPdfBtn');
            const selectSolusiBtn = document.getElementById('select-solusi-btn');
            const selectMsiBtn = document.getElementById('select-msi-btn');
            const currentLabNameSpan = document.getElementById('current-lab-name');

            // --- SOP CONTENT DATA ---
            const sopData = {
                solusi: {
                    title: "STANDAR OPERASIONAL PROSEDUR (SOP) LABORATORIUM SOLUSI",
                    sections: [
                        {
                            header: "Tujuan SOP Laboratorium Solusi",
                            content: [
                                "Tujuan disusunnya Standar Operasional Prosedur (SOP) Laboratorium Solusi UPN \"Veteran\" Jawa Timur adalah untuk mendukung kelancaran pengelolaan laboratorium secara optimal. Hal ini bertujuan agar seluruh fasilitas dan sumber daya yang tersedia dapat dimanfaatkan secara maksimal, sehingga mampu menunjang pencapaian visi dan misi UPN \"Veteran\" Jawa Timur. Visi dan misi tersebut mencakup peran aktif dalam pengembangan ilmu pengetahuan dan teknologi pada tingkat sarjana, guna meningkatkan kesejahteraan masyarakat melalui kegiatan pendidikan, penelitian, pengabdian kepada masyarakat, serta tata kelola yang berbasis teknologi informasi dan komunikasi.",
                                "Laboratorium Solusi secara spesifik berfokus pada pengembangan sistem informasi, analisis data, pemodelan machine learning, perancangan desain antarmuka sistem informasi, dan bidang terkait lainnya. SOP ini memastikan standar tertinggi dalam setiap kegiatan."
                            ],
                            listItems: []
                        },
                        {
                            header: "FUNGSI DAN STRUKTUR LABORATORIUM",
                            content: [
                                "Fungsi utama dari Laboratorium Solusi adalah sebagai sarana untuk melakukan praktik atau penerapan atas teori, penelitian dan pengembangan keilmuan di Program Studi Sistem Informasi, khususnya dalam bidang pengembangan solusi teknologi. Secara terperinci Laboratorium Solusi berperan sebagai:"
                            ],
                            listItems: [
                                "Pusat praktik, latihan, penelitian, tugas akhir, dan sumber pembelajaran bagi dosen dan mahasiswa dalam pengembangan aplikasi dan sistem.",
                                "Pusat penelitian, pengabdian masyarakat, dan pengembangan bagi dosen dan mahasiswa di bidang rekayasa perangkat lunak dan data science.",
                                "Pusat pengembangan keilmuan Rekayasa Perangkat Lunak, Analisis Data, dan Desain Antarmuka Pengguna.",
                                "Pusat Workshop, pengembangan SDM, serta pusat layanan terhadap sivitas akademik dan masyarakat dalam meningkatkan mutu pembelajaran bidang teknologi informasi dan pengembangan solusi."
                            ]
                        },
                        {
                            header: "Struktur Laboratorium",
                            content: [
                                "Struktur Laboratorium Solusi terdiri dari Kepala Laboratorium, Asisten Laboratorium, Asisten Praktikum, dan Peserta Praktikum.",
                                "Kepala Laboratorium: Pengelola laboratorium yang mendayagunakan seluruh sumber daya secara terencana, terawasi, dan terevaluasi.",
                                "Laboran: Staf administrasi yang ditunjuk dan ditugaskan dalam pengelolaan, pengembangan, serta kelancaran pelaksanaan praktikum.",
                                "Asisten Laboratorium: Mahasiswa yang ditunjuk untuk menyiapkan dan memastikan kesiapan perangkat keras maupun lunak, mendampingi dosen dan mahasiswa selama kegiatan, bertanggung jawab dalam pemeliharaan peralatan, pencatatan administrasi, serta mendukung pengujian sistem informasi sederhana. Berperan menjaga keamanan, ketertiban, dan penggunaan fasilitas laboratorium sesuai prosedur.",
                                "Asisten Praktikum: Mahasiswa yang ditunjuk oleh Kepala Laboratorium untuk memberikan penjelasan materi praktikum bagi mahasiswa untuk matakuliah tertentu.",
                                "Peserta Praktikum: Mahasiswa yang telah terdaftar untuk mata kuliah yang bersangkutan pada semester berjalan yang ditunjukkan dengan Kartu Rencana Studi (KRS) dan telah mendaftarkan diri untuk kegiatan praktikum pada semester berjalan."
                            ],
                            listItems: []
                        },
                        {
                            header: "TATA TERTIB LABORATORIUM",
                            content: [],
                            listItems: [] // Subsections will be handled as separate accordion items
                        },
                        {
                            header: "Tata Tertib Penggunaan Laboratorium Komputer",
                            content: [],
                            listItems: [
                                "Laboratorium hanya boleh digunakan untuk kegiatan akademik seperti praktikum, pelatihan, penelitian, dan tugas akhir.",
                                "Mahasiswa atau Dosen yang meminjam peralatan laboratorium harus memenuhi ketentuan peminjaman dan pengembalian.",
                                "Mahasiswa dilarang membuat keributan di dalam laboratorium.",
                                "Dilarang makan, minum dan merokok di dalam laboratorium.",
                                "Membuang sampah harus pada tempat sampah yang sudah ditentukan.",
                                "Semua pengunjung laboratorium wajib menjaga kebersihan laboratorium.",
                                "Semua mahasiswa yang mengunjungi atau praktek di laboratorium, wajib merapikan kembali semua peralatan laboratorium yang digunakan.",
                                "Dilarang membawa peralatan laboratorium keluar ruang laboratorium tanpa izin dari Laboran (staf lab) dan Ketua Laboratorium.",
                                "Dilarang membawa pulang peralatan laboratorium.",
                                "Semua pengunjung laboratorium harus menjaga keamanan inventaris laboratorium.",
                                "Jika terjadi kerusakan dan kehilangan peralatan laboratorium, maka pengunjung yang merusakkan atau menghilangkan alat tersebut wajib melapor ke petugas laboratorium dan mengganti alat tersebut.",
                                "Jika tidak ada yang melapor telah menghilangkan atau merusakkan alat laboratorium, maka semua mahasiswa yang mengunjungi laboratorium wajib mengganti 2 kali lipatnya."
                            ]
                        },
                        {
                            header: "Tata Tertib Praktek Laboratorium",
                            content: [],
                            listItems: [
                                "Setiap mahasiswa wajib mengikuti praktik.",
                                "Berpakaian sopan dan rapi saat masuk ke dalam laboratorium.",
                                "Selama praktek di laboratorium dilarang membuat gaduh, makan, minum dan merokok di dalam laboratorium.",
                                "Selesai praktikum tempat kerja harus dibersihkan dan dirapikan kembali, serta alat-alat dikembalikan pada tempatnya.",
                                "Peralatan laboratorium yang dipakai dalam praktikum, menjadi tanggung jawab mahasiswa, oleh karenanya harus berhati-hati dalam mempergunakannya.",
                                "Setiap pengguna laboratorium DILARANG mengubah setting jenis apapun yang menyangkut setting komputer yang ada di laboratorium komputer.",
                                "Setiap pengguna laboratorium DILARANG memasukkan jenis data atau program apapun ke dalam komputer tanpa seijin pihak laboratorium.",
                                "Setiap pengguna laboratorium DILARANG menghapus atau memindahkan data atau software apapun yang berbentuk file atau direktori di komputer.",
                                "Setiap pengguna laboratorium DILARANG Membuat keributan ataupun memainkan jenis game apapun di dalam laboratorium selama perkuliahan berlangsung.",
                                "Setiap pengguna laboratorium DILARANG Melakukan perusakan dalam bentuk apapun terhadap fasilitas di laboratorium.",
                                "Penggunaan Lab Komputer disesuaikan dengan jadwal yang telah ditentukan. Bila hendak menggunakan ruang laboratorium dengan waktu yang lebih lama melebihi dari jadwal, maka praktikan harus meminta izin kepada petugas lab dan tergantung dari kondisi saat itu yang akan ditentukan oleh pihak lab. Permohonan harus diajukan paling lambat 1 minggu sebelum jadwal perubahan yang dimaksud."
                            ]
                        },
                        {
                            header: "PROSEDUR PEMAKAIAN LABORATORIUM",
                            content: [
                                "Pada dasarnya Laboratorium digunakan untuk menunjang kegiatan belajar mengajar di kelas yang bersifat teori. Namun tetap dimungkinkan untuk menggunakan selain keperluan tersebut asalkan sebagai penunjang akademik atmosfir baik untuk mahasiswanya maupun dosen."
                            ],
                            listItems: []
                        },
                        {
                            header: "Prosedur Pemakaian Laboratorium untuk Praktikum Mata Kuliah",
                            content: [
                                "Pada saat praktikum dilaksanakan, tahap-tahap yang harus dilakukan adalah:",
                                "Laboran/teknisi mempersiapkan sarana prasarana Laboratorium bagi pengguna Laboratorium, yang meliputi:",
                                "Membuka ruang Lab dan memastikan bahwa ruangan dalam keadaan bersih.",
                                "Menyalakan AC dan lampu untuk menjamin keamanan dan kenyamanan Lab.",
                                "Asisten lab/dosen pengampu mata kuliah memastikan bahwa komputer dan sarana/prasarana pendukung siap digunakan.",
                                "Pada saat pelaksanaan praktikum, mahasiswa memasuki ruangan dengan tertib, dan harus mematuhi aturan-aturan berikut:",
                                "Tidak diperbolehkan membawa makanan dan minuman ke dalam ruang laboratorium.",
                                "Menempati kursi/bangku yang tersedia.",
                                "Menyalakan komputer sesuai dengan urutan sbb:",
                                "i. Pasang kabel power ke stop kontak.",
                                "ii. Tekan tombol power untuk menyalakan komputer, mouse dan keyboard.",
                                "iii. Membuka software sesuai dengan instruksi dari asisten/instruktur.",
                                "iv. Jika ada permasalahan, segera melaporkan pada asisten/teknisi.",
                                "Melaksanakan praktikum dengan tertib",
                                "Setelah praktikum dilaksanakan, praktikan wajib melakukan hal-hal berikut:",
                                "i. Menutup software yang telah digunakan.",
                                "ii. Mematikan (shut down) computer.",
                                "iii. Mematikan mouse dan keyboard.",
                                "iv. Cabut kabel dari stop kontak.",
                                "v. Meninggalkan ruangan dengan tertib.",
                                "Setelah semua aktivitas praktikum selesai, dan tidak ada mahasiswa di dalam lab, laboran memastikan bahwa semua komputer dan stavolt sudah dimatikan dan mematikan AC."
                            ],
                            listItems: []
                        },
                        {
                            header: "Prosedur Pemakaian Laboratorium untuk Penelitian dan Tugas Akhir",
                            content: [
                                "Jika seorang dosen/ mahasiswa akan melakukan penelitian yang dalam pelaksanaannya akan menggunakan sarana prasarana Laboratorium dan melibatkan mahasiswa, maka tahap-tahap yang harus dilakukan adalah:",
                                "Laboran/teknisi mempersiapkan sarana prasarana Laboratorium Komputer bagi dosen/mahasiswa peneliti.",
                                "Asisten lab/dosen peneliti memastikan bahwa komputer dan sarana/prasarana pendukung siap digunakan.",
                                "Pada saat pelaksanaan penelitian, dosen/mahasiswa harus mematuhi aturan-aturan berikut:",
                                "Tidak diperbolehkan membawa makanan dan minuman ke dalam ruang laboratorium.",
                                "Menempati kursi/bangku yang tersedia.",
                                "Menyalakan komputer sesuai dengan urutan sbb:",
                                "i. Pasang kabel power ke stop kontak.",
                                "ii. Tekan tombol power untuk menyalakan komputer, mouse, dan keyboard.",
                                "iii. Memilih/membuka software sesuai dengan intruksi dari asisten/instruktur.",
                                "iv. Jika ada permasalahan, segera melaporkan pada asisten/teknisi.",
                                "Setelah kegiatan penelitian dilaksanakan, dosen/mahasiswa peneliti wajib melakukan hal-hal berikut:",
                                "i. Menutup software yang telah digunakan.",
                                "ii. Mematikan (shut down) komputer.",
                                "iii. Mematikan mouse dan keyboard.",
                                "iv. Mematikan stavolt.",
                                "v. Meninggalkan ruangan dengan tertib."
                            ],
                            listItems: []
                        },
                        {
                            header: "Prosedur Pemakaian Laboratorium untuk Pelaksanaan Workshop atau Pelatihan",
                            content: [
                                "Prosedur yang harus dilaksanakan jika tim dosen/mahasiswa akan menggunakan sarana prasarana Laboratorium untuk workshop atau pelatihan yang pesertanya berasal dari luar Program Studi Sistem Informasi adalah:",
                                "Koordinator (dosen/mahasiswa) kegiatan mengajukan permohonan/proposal kepada Kepala Laboratorium beserta keperluan peminjaman alat/ruangan Laboratorium yang dituju.",
                                "Apabila permohonan/proposal tersebut disetujui oleh Kepala Laboratorium, maka Kepala Laboratorium akan memberikan disposisi kepada Koordinator Program Studi tentang keperluan pemakaian ruang/lab tersebut.",
                                "Koordinator kegiatan yang bersangkutan mendaftarkan rencana pelaksanaan penelitian kepada Kepala Laboratorium, sesuai dengan yang dicantumkan dalam proposal penelitian. Permintaan ini dilengkapi dengan:",
                                "a. Jadwal pelaksanaan.",
                                "b. Software yang digunakan.",
                                "c. Dosen/laboran/asisten yang terlibat dalam kegiatan.",
                                "d. Daftar peserta kegiatan.",
                                "Laboran/Teknisi menyiapkan jadwal pelaksanaan, sarana dan prasarana, dan software yang diperlukan dan berkoordinasi dengan Kepala Laboratorium/Koordinator kegiatan yang bersangkutan.",
                                "Pada saat kegiatan dilaksanakan, koordinator kegiatan/laboran harus memastikan bahwa seluruh tahap kegiatan di Lab harus sesuai dengan SOP pemakaian sarana dan prasarana Lab untuk praktikum.",
                                "Setelah semua aktivitas Workshop atau Pelatihan selesai dilaksanakan, dosen/mahasiswa koordinator diharapkan membuat laporan kepada Kepala Laboratorium yang berisi ringkasan kegiatan yang nantinya akan digunakan sebagai pendukung dokumentasi kegiatan laboratorium."
                            ],
                            listItems: []
                        },
                        {
                            header: "PROSEDUR PERAWATAN DAN PERBAIKAN LABORATORIUM",
                            content: [
                                "Prosedur perawatan Lab yang berlaku di Laboratorium Solusi sebagai berikut:"
                            ],
                            listItems: [
                                "Laboran mengecek semua peralatan laboratorium setiap bulan.",
                                "Laboran mengisi form kondisi peralatan laboratorium.",
                                "Laboran mendata peralatan yang rusak dan memasukkan pada form peralatan rusak.",
                                "Laboran mengecek apakah peralatan tersebut dapat diperbaiki sendiri, bila tidak maka laboran memberitahu dan meminta persetujuan Kepala Laboratorium untuk perbaikan di luar atau mengganti dengan yang baru.",
                                "Kepala Laboratorium menyetujui dan menandatangani.",
                                "Surat pengajuan peralatan laboratorium ditujukan kepada Koordinator Program Studi."
                            ]
                        }
                    ]
                },
                msi: {
                    title: "STANDAR OPERASIONAL PROSEDUR (SOP) LABORATORIUM MANAJEMEN SISTEM INFORMASI",
                    sections: [
                        {
                            header: "Tujuan SOP Laboratorium Manajemen Sistem Informasi",
                            content: [
                                "Tujuan disusunnya Standar Operasional Prosedur (SOP) Laboratorium Manajemen Sistem Informasi UPN \"Veteran\" Jawa Timur adalah untuk mendukung kelancaran pengelolaan laboratorium secara optimal. Hal ini bertujuan agar seluruh fasilitas dan sumber daya yang tersedia dapat dimanfaatkan secara maksimal, sehingga mampu menunjang pencapaian visi dan misi UPN \"Veteran\" Jawa Timur. Visi dan misi tersebut mencakup peran aktif dalam pengembangan ilmu pengetahuan dan teknologi pada tingkat sarjana, guna meningkatkan kesejahteraan masyarakat melalui kegiatan pendidikan, penelitian, pengabdian kepada masyarakat, serta tata kelola yang berbasis teknologi informasi dan komunikasi.",
                                "Kegiatan yang ada dalam lingkup pengelolaan laboratorium meliputi praktikum, penggunaan peralatan laboratorium, penggunaan laboratorium untuk penelitian (tugas kuliah dan tugas akhir) dan kerjasama penelitian, praktik pembelajaran, diskusi (responsi dan asistensi), simulasi atau sejenisnya."
                            ],
                            listItems: []
                        },
                        {
                            header: "FUNGSI DAN STRUKTUR LABORATORIUM",
                            content: [
                                "Fungsi utama dari Laboratorium Manajemen Sistem Informasi sebagai sarana untuk melakukan praktik atau penerapan atas teori, penelitian dan pengembangan keilmuan di Program Studi Sistem Informasi, sehingga menjadi unsur penting dalam kegiatan pendidikan dan penelitian, khususnya di bidang pembelajaran. Secara terperinci Laboratorium Manajemen Sistem Informasi berperan sebagai :"
                            ],
                            listItems: [
                                "Pusat praktik, latihan, penelitian, tugas akhir dan sumber pembelajaran bagi dosen dan mahasiswa.",
                                "Pusat penelitian, pengabdian masyarakat dan pengembangan bagi dosen dan mahasiswa.",
                                "Pusat pengembangan keilmuan Manajemen Sistem Informasi.",
                                "Pusat Workshop, pengembangan SDM serta pusat layanan terhadap sivitas akademik dan masyarakat dalam meningkatkan mutu pembelajaran bidang teknologi informasi."
                            ]
                        },
                        {
                            header: "Struktur Laboratorium",
                            content: [
                                "Struktur Laboratorium Manajemen Sistem Informasi terdiri Kepala Laboratorium, Asisten Laboratorium, Asisten Praktikum, dan Peserta Praktikum.",
                                "Kepala Laboratorium adalah pengelola laboratorium dengan mendayagunakan seluruh sumber daya secara terencana, terawasi, dan terevaluasi.",
                                "Laboran adalah staff administrasi yang ditunjuk dan ditugaskan dalam pengelolaan, pengembangan, serta kelancaran pelaksanaan praktikum.",
                                "Asisten Laboratorium adalah mahasiswa yang ditunjuk oleh Kepala Laboratorium untuk menyiapkan dan memastikan kesiapan perangkat keras maupun lunak sebelum praktikum, mendampingi dosen dan mahasiswa selama kegiatan laboratorium. Asisten juga bertanggung jawab dalam pemeliharaan peralatan, pencatatan administrasi laboratorium, serta mendukung pengujian sistem informasi sederhana. Selain itu, asisten laboratorium berperan menjaga keamanan, ketertiban, dan penggunaan fasilitas laboratorium sesuai dengan prosedur yang berlaku.",
                                "Asisten Praktikum adalah mahasiswa yang ditunjuk oleh Kepala Laboratorium untuk memberikan penjelasan materi praktikum bagi mahasiswa untuk matakuliah tertentu.",
                                "Peserta Praktikum adalah mahasiswa yang telah terdaftar untuk mata kuliah yang bersangkutan pada semester berjalan yang ditunjukkan dengan Kartu Rencana Studi (KRS) dan telah mendaftarkan diri untuk kegiatan praktikum pada semester berjalan."
                            ],
                            listItems: []
                        },
                        {
                            header: "TATA TERTIB LABORATORIUM",
                            content: [
                                "Tata Tertib yang berlaku di Laboratorium Manajemen Sistem Informasi sebagai berikut :"
                            ],
                            listItems: [] // Subsections will be handled as separate accordion items
                        },
                        {
                            header: "Tata Tertib Penggunaan Laboratorium Komputer",
                            content: [],
                            listItems: [
                                "Laboratorium hanya boleh digunakan untuk kegiatan akademik seperti praktikum, pelatihan, penelitian, dan tugas akhir.",
                                "Mahasiswa atau Dosen yang meminjam peralatan laboratorium harus memenuhi ketentuan peminjaman dan pengembalian.",
                                "Mahasiswa dilarang membuat keributan di dalam laboratorium.",
                                "Dilarang makan, minum dan merokok di dalam laboratorium.",
                                "Membuang sampah harus pada tempat sampah yang sudah ditentukan.",
                                "Semua pengunjung laboratorium wajib menjaga kebersihan laboratorium.",
                                "Semua mahasiswa yang mengunjungi atau praktek di laboratorium, wajib merapikan kembali semua peralatan laboratorium yang digunakan.",
                                "Dilarang membawa peralatan laboratorium keluar ruang laboratorium tanpa izin dari Laboran (staff lab) dan Ketua Laboratorium.",
                                "Dilarang membawa pulang peralatan laboratorium.",
                                "Semua pengunjung laboratorium harus menjaga keamanan inventaris laboratorium.",
                                "Jika terjadi kerusakan dan kehilangan peralatan laboratorium, maka pengunjung yang merusakkan atau menghilangkan alat tersebut wajib melapor ke petugas laboratorium dan mengganti alat tersebut.",
                                "Jika tidak ada yang melapor telah menghilangkan atau merusakkan alat laboratorium, maka semua mahasiswa yang mengunjungi laboratorium wajib mengganti 2 kali lipatnya."
                            ]
                        },
                        {
                            header: "Tata Tertib Praktek Laboratorium",
                            content: [],
                            listItems: [
                                "Setiap mahasiswa wajib mengikuti praktik.",
                                "Berpakaian sopan dan rapi saat masuk ke dalam laboratorium.",
                                "Selama praktek di laboratorium dilarang membuat gaduh, makan, minum dan merokok di dalam laboratorium.",
                                "Selesai praktikum tempat kerja harus dibersihkan dan dirapikan kembali, serta alat-alat dikembalikan pada tempatnya.",
                                "Peralatan laboratorium yang dipakai dalam praktikum, menjadi tanggung jawab mahasiswa, oleh karenanya harus berhati-hati dalam mempergunakannya.",
                                "Setiap pengguna laboratorium DILARANG mengubah setting jenis apapun yang menyangkut setting komputer yang ada di laboratorium komputer.",
                                "Setiap pengguna laboratorium DILARIUM memasukkan jenis data atau program apapun ke dalam komputer tanpa seijin pihak laboratorium.",
                                "Setiap pengguna laboratorium DILARANG menghapus atau memindahkan data atau software apapun yang berbentuk file atau direktori di komputer.",
                                "Setiap pengguna laboratorium DILARANG Membuat keributan ataupun memainkan jenis game apapun di dalam laboratorium selama perkuliahan berlangsung.",
                                "Setiap pengguna laboratorium DILARANG Melakukan perusakan dalam bentuk apapun terhadap fasilitas di laboratorium.",
                                "Penggunaan Lab Komputer disesuaikan dengan jadwal yang telah ditentukan. Bila hendak menggunakan ruang laboratorium dengan waktu yang lebih lama melebihi dari jadwal, maka praktikan harus meminta izin kepada petugas lab dan tergantung dari kondisi saat itu yang akan ditentukan oleh pihak lab. Permohonan harus diajukan paling lambat 1 minggu sebelum jadwal perubahan yang dimaksud."
                            ]
                        },
                        {
                            header: "PROSEDUR PEMAKAIAN LABORATORIUM",
                            content: [
                                "Pada dasarnya Laboratorium digunakan untuk menunjang kegiatan belajar mengajar di kelas yang bersifat teori. Namun tetap dimungkinkan untuk menggunakan selain keperluan tersebut asalkan sebagai penunjang akademik atmosfir baik untuk mahasiswanya maupun dosen."
                            ],
                            listItems: []
                        },
                        {
                            header: "Prosedur Pemakaian Laboratorium untuk Praktikum Mata Kuliah",
                            content: [
                                "Pada saat praktikum dilaksanakan, tahap-tahap yang harus dilakukan adalah :",
                                "Laboran/teknisi mempersiapkan sarana prasarana Laboratorium bagi pengguna Laboratorium, yang meliputi:",
                                "Membuka ruang Lab dan memastikan bahwa ruangan dalam keadaan bersih.",
                                "Menyalakan AC dan lampu untuk menjamin keamanan dan kenyamanan Lab.",
                                "Asisten lab/dosen pengampu mata kuliah memastikan bahwa komputer dan sarana/prasarana pendukung siap digunakan.",
                                "Pada saat pelaksanaan praktikum, mahasiswa memasuki ruangan dengan tertib, dan harus mematuhi aturan-aturan berikut:",
                                "Tidak diperbolehkan membawa makanan dan minuman ke dalam ruang laboratorium.",
                                "Menempati kursi/bangku yang tersedia.",
                                "Menyalakan komputer sesuai dengan urutan sbb:",
                                "i. Pasang kabel power ke stop kontak.",
                                "ii. Tekan tombol power untuk menyalakan komputer, mouse dan keyboard.",
                                "iii. Membuka software sesuai dengan instruksi dari asisten/instruktur.",
                                "iv. Jika ada permasalahan, segera melaporkan pada asisten/teknisi.",
                                "Melaksanakan praktikum dengan tertib",
                                "Setelah praktikum dilaksanakan, praktikan wajib melakukan hal-hal berikut:",
                                "i. Menutup software yang telah digunakan.",
                                "ii. Mematikan (shut down) computer.",
                                "iii. Mematikan mouse dan keyboard.",
                                "iv. Cabut kabel dari stop kontak.",
                                "v. Meninggalkan ruangan dengan tertib.",
                                "Setelah semua aktivitas praktikum selesai, dan tidak ada mahasiswa di dalam lab, laboran memastikan bahwa semua komputer dan stavolt sudah dimatikan dan mematikan AC."
                            ],
                            listItems: []
                        },
                        {
                            header: "Prosedur Pemakaian Laboratorium untuk Penelitian dan Tugas Akhir",
                            content: [
                                "Jika seorang dosen/ mahasiswa akan melakukan penelitian yang dalam pelaksanaannya akan menggunakan sarana prasarana Laboratorium dan melibatkan mahasiswa, maka tahap-tahap yang harus dilakukan adalah :",
                                "Laboran/teknisi mempersiapkan sarana prasarana Laboratorium Komputer bagi dosen/mahasiswa peneliti.",
                                "Asisten lab/dosen peneliti memastikan bahwa komputer dan sarana/prasarana pendukung siap digunakan.",
                                "Pada saat pelaksanaan penelitian, dosen/mahasiswa harus mematuhi aturan-aturan berikut:",
                                "Tidak diperbolehkan membawa makanan dan minuman ke dalam ruang laboratorium.",
                                "Menempati kursi/bangku yang tersedia.",
                                "Menyalakan komputer sesuai dengan urutan sbb:",
                                "i. Pasang kabel power ke stop kontak.",
                                "ii. Tekan tombol power untuk menyalakan komputer, mouse, dan keyboard.",
                                "iii. Memilih/membuka software sesuai dengan intruksi dari asisten/instruktur.",
                                "iv. Jika ada permasalahan, segera melaporkan pada asisten/teknisi.",
                                "Setelah kegiatan penelitian dilaksanakan, dosen/mahasiswa peneliti wajib melakukan hal-hal berikut :",
                                "i. Menutup software yang telah digunakan.",
                                "ii. Mematikan (shut down) komputer.",
                                "iii. Mematikan mouse dan keyboard.",
                                "iv. Mematikan stavolt.",
                                "v. Meninggalkan ruangan dengan tertib."
                            ],
                            listItems: []
                        },
                        {
                            header: "Prosedur Pemakaian Laboratorium untuk Pelaksanaan Workshop atau Pelatihan",
                            content: [
                                "Prosedur yang harus dilaksanakan jika tim dosen/mahasiswa akan menggunakan sarana prasarana Laboratorium untuk workshop atau pelatihan yang pesertanya berasal dari luar Program Studi Sistem Informasi adalah :",
                                "Koordinator (dosen/mahasiswa) kegiatan mengajukan permohonan/proposal kepada Kepala Laboratorium beserta keperluan peminjaman alat/ruangan Laboratorium yang dituju.",
                                "Apabila permohonan/proposal tersebut disetujui oleh Kepala Laboratorium, maka Kepala Laboratorium akan memberikan disposisi kepada Koordinator Program Studi tentang keperluan pemakaian ruang/lab tersebut.",
                                "Koordinator kegiatan yang bersangkutan mendaftarkan rencana pelaksanaan penelitian kepada Kepala Laboratorium, sesuai dengan yang dicantumkan dalam proposal penelitian. Permintaan ini dilengkapi dengan:",
                                "a. Jadwal pelaksanaan.",
                                "b. Software yang digunakan.",
                                "c. Dosen/laboran/asisten yang terlibat dalam kegiatan.",
                                "d. Daftar peserta kegiatan.",
                                "Laboran/Teknisi menyiapkan jadwal pelaksanaan, sarana dan prasarana, dan software yang diperlukan dan berkoordinasi dengan Kepala Laboratorium/Koordinator kegiatan yang bersangkutan.",
                                "Pada saat kegiatan dilaksanakan, koordinator kegiatan/laboran harus memastikan bahwa seluruh tahap kegiatan di Lab harus sesuai dengan SOP pemakaian sarana dan prasarana Lab untuk praktikum.",
                                "Setelah semua aktivitas Workshop atau Pelatihan selesai dilaksanakan, dosen/mahasiswa koordinator diharapkan membuat laporan kepada Kepala Laboratorium yang berisi ringkasan kegiatan yang nantinya akan digunakan sebagai pendukung dokumentasi kegiatan laboratorium."
                            ],
                            listItems: []
                        },
                        {
                            header: "PROSEDUR PERAWATAN DAN PERBAIKAN LABORATORIUM",
                            content: [
                                "Prosedur perawatan Lab yang berlaku di Laboratorium Manajemen Sistem Informasi sebagai berikut :"
                            ],
                            listItems: [
                                "Laboran mengecek semua peralatan laboratorium setiap bulan.",
                                "Laboran mengisi form kondisi peralatan laboratorium.",
                                "Laboran mendata peralatan yang rusak dan memasukkan pada form peralatan rusak.",
                                "Laboran mengecek apakah peralatan tersebut dapat diperbaiki sendiri, bila tidak maka laboran memberitahu dan meminta persetujuan Kepala Laboratorium untuk perbaikan di luar atau mengganti dengan yang baru.",
                                "Kepala Laboratorium menyetujui dan menandatangani.",
                                "Surat pengajuan peralatan laboratorium ditujukan kepada Koordinator Program Studi."
                            ]
                        }
                    ]
                }
            };

            let currentLab = 'solusi'; // Default to Solusi Lab

            function renderAccordion(labKey) {
                const labSOP = sopData[labKey];
                if (!labSOP) return;

                sopAccordion.innerHTML = ''; // Clear existing content
                currentLabNameSpan.textContent = labKey === 'solusi' ? 'Solusi' : 'MSI';

                labSOP.sections.forEach(section => {
                    const accordionItem = document.createElement('div');
                    accordionItem.className = 'rounded-lg border bg-white shadow-sm';

                    let contentHtml = '';
                    if (section.content.length > 0) {
                        section.content.forEach(p => {
                            contentHtml += `<p class="mb-2">${p}</p>`;
                        });
                    }
                    if (section.listItems.length > 0) {
                        contentHtml += '<ul class="list-disc space-y-2 pl-5">';
                        section.listItems.forEach(li => {
                            contentHtml += `<li>${li}</li>`;
                        });
                        contentHtml += '</ul>';
                    }

                    accordionItem.innerHTML = `
                        <button class="accordion-trigger w-full flex justify-between items-center p-6 text-left font-semibold">
                            <span class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-primary"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9Z"/><polyline points="13 2 13 9 20 9"/><path d="M10.15 12.9a1.46 1.46 0 0 0-2.3.4L6 16.9"/><path d="m14 19-2-2-1.5-1.5"/><path d="M10.15 12.9C12.47 11.25 16.33 11.2 18 13"/><path d="m14 19c2.3-1.65 6.17-1.6 7.82.05"/></svg>
                                ${section.header}
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 shrink-0"><path d="m6 9 6 6 6-6"/></svg>
                        </button>
                        <div class="accordion-content">
                            <div class="p-6 pt-0 text-foreground-80">
                                ${contentHtml}
                            </div>
                        </div>
                    `;
                    sopAccordion.appendChild(accordionItem);
                });

                // Re-attach accordion event listeners after rendering new content
                attachAccordionListeners();
            }

            function attachAccordionListeners() {
                const triggers = sopAccordion.querySelectorAll('.accordion-trigger');
                triggers.forEach(trigger => {
                    trigger.removeEventListener('click', toggleAccordion); // Prevent duplicate listeners
                    trigger.addEventListener('click', toggleAccordion);
                });
            }

            function toggleAccordion() {
                const content = this.nextElementSibling;
                const icon = this.querySelector('svg:last-child');

                const isActive = this.classList.toggle('active');

                if (isActive) {
                    content.style.maxHeight = content.scrollHeight + 'px';
                    icon.style.transform = 'rotate(180deg)';
                } else {
                    content.style.maxHeight = '0px';
                    icon.style.transform = 'rotate(0deg)';
                }
            }

            // --- PDF DOWNLOAD LOGIC ---
            downloadPdfBtn.addEventListener('click', function() {
                const { jsPDF } = window.jspdf;
                const doc = new jsPDF();
                
                let y = 15; // Initial y position
                const pageHeight = doc.internal.pageSize.height;
                const margin = 15;
                const maxWidth = doc.internal.pageSize.width - margin * 2;

                const labSOP = sopData[currentLab];
                if (!labSOP) {
                    alert('SOP data not found for the selected lab.');
                    return;
                }

                // Add title for the current lab's SOP
                doc.setFontSize(22);
                doc.setFont(undefined, 'bold');
                doc.text(labSOP.title, doc.internal.pageSize.width / 2, y, { align: 'center' });
                y += 15;

                labSOP.sections.forEach(section => {
                    if (y > pageHeight - 30) { // Check if new page is needed for header
                        doc.addPage();
                        y = 15;
                    }
                    doc.setFontSize(14);
                    doc.setFont(undefined, 'bold');
                    doc.text(section.header, margin, y);
                    y += 14 * 0.5 + 4; // space after header

                    doc.setFontSize(10);
                    doc.setFont(undefined, 'normal');

                    // Add content paragraphs
                    section.content.forEach(textLine => {
                        if (y > pageHeight - 20) { // Check if new page is needed for text
                            doc.addPage();
                            y = 15;
                        }
                        const lines = doc.splitTextToSize(textLine, maxWidth);
                        doc.text(lines, margin, y);
                        y += lines.length * 4.5;
                        y += 2; // Small space after paragraph
                    });

                    // Add list items
                    section.listItems.forEach(listItem => {
                        if (y > pageHeight - 20) { // Check if new page is needed for list item
                            doc.addPage();
                            y = 15;
                        }
                        const lines = doc.splitTextToSize(`- ${listItem}`, maxWidth);
                        doc.text(lines, margin + 5, y); // Indented for list
                        y += lines.length * 4.5;
                        y += 2; // Small space after list item
                    });
                    y += 5; // Space between sections
                });
                
                doc.save(`${labSOP.title.replace(/ /g, '_')}.pdf`);
            });

            // --- LAB SELECTION LOGIC ---
            selectSolusiBtn.addEventListener('click', () => {
                currentLab = 'solusi';
                renderAccordion('solusi');
                selectSolusiBtn.classList.remove('bg-gray-300', 'text-gray-800');
                selectSolusiBtn.classList.add('bg-blue-500', 'text-white');
                selectMsiBtn.classList.remove('bg-blue-500', 'text-white');
                selectMsiBtn.classList.add('bg-gray-300', 'text-gray-800');
            });

            selectMsiBtn.addEventListener('click', () => {
                currentLab = 'msi';
                renderAccordion('msi');
                selectMsiBtn.classList.remove('bg-gray-300', 'text-gray-800');
                selectMsiBtn.classList.add('bg-blue-500', 'text-white');
                selectSolusiBtn.classList.remove('bg-blue-500', 'text-white');
                selectSolusiBtn.classList.add('bg-gray-300', 'text-gray-800');
            });

            renderAccordion(currentLab);
        });
    </script>
</body>
</html>