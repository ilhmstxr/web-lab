@extends('layout.main')

@section('content')
    <style>
        /* Custom styles to match the theme */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
            /* Lighter Gray Background */
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

        .bg-primary-10 {
            background-color: #e0e7ff;
        }

        .text-primary-foreground {
            color: #ffffff;
        }

        .bg-secondary {
            background-color: #f3f4f6;
        }

        .text-secondary-foreground {
            color: #374151;
        }

        .text-foreground-80 {
            color: #4a5568;
        }

        .text-muted-foreground {
            color: #6b7280;
        }

        .bg-accent {
            background-color: #34d399;
        }

        .text-accent-foreground {
            color: #ffffff;
        }

        .sticky-card {
            position: -webkit-sticky;
            position: sticky;
            top: 6rem;
            /* Adjust this value based on header height */
        }
    </style>


    <main class="flex-1 py-12 md:py-24">
        <div class="container mx-auto px-4 md:px-6">
            <div class="text-center mb-16">
                <h1 class="text-4xl font-bold tracking-tighter sm:text-5xl text-primary font-headline">
                    Eksplorasi Riset Unggulan
                </h1>
                <p class="max-w-[800px] mx-auto text-foreground-80 md:text-xl mt-4">
                    Selami lebih dalam inovasi dan penemuan yang membentuk masa depan melalui proyek penelitian kami.
                </p>
            </div>

            <div class="grid lg:grid-cols-12 gap-8 lg:gap-12">
                <!-- Left Column: Categories and Research List -->
                <div class="lg:col-span-4 xl:col-span-3 space-y-8">
                    <div class="rounded-lg border bg-white shadow-sm">
                        <div class="max-w-xs w-full bg-white p-4 border border-gray-200 rounded-lg shadow-sm font-sans">

                            <h2 class="text-lg font-bold text-gray-800 mb-4">Kategori</h2>

                            <ul class="space-y-2">

                                @foreach ($category as $c)
                                    <li>
                                        <a href="#"
                                            class="flex items-center space-x-3 px-4 py-2 rounded-md text-gray-700 hover:bg-gray-100 transition-colors duration-200">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                            </svg>
                                            <span class="font-medium">{{ $c->name }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="rounded-lg border bg-white shadow-sm">
                        <div class="p-6">
                            <h2 class="text-xl font-bold">Daftar Riset</h2>
                            <p id="research-list-description" class="text-sm text-muted-foreground mb-4"></p>
                            <ul class="space-y-2">

                                @foreach ($topic as $t)
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-3 rounded-lg bg-indigo-100 text-indigo-700 font-medium transition-colors duration-200">
                                            {{ $t }} </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Research Detail -->
                <div id="research-detail-container" class="lg:col-span-8 xl:col-span-9">
                    <!-- Research detail card will be inserted here by JS -->
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- DATA STORE ---
            const researchData = [{
                    category: 'Bioteknologi',
                    researches: [{
                        id: 'bio-1',
                        title: 'Terapi Gen untuk Penyakit Keturunan',
                        lead: 'Prof. Dr. Adisti Wulandari',
                        summary: 'Penelitian ini berfokus pada penggunaan teknologi CRISPR-Cas9 untuk memperbaiki mutasi genetik yang menyebabkan penyakit keturunan seperti talasemia dan fibrosis kistik. Kami mengeksplorasi vektor pengiriman yang efisien dan aman untuk sel target.',
                        status: 'Berjalan',
                        year: 2023,
                        collaborators: ['Universitas Gadjah Mada', 'Eijkman Institute'],
                        funding: 'Kemenristekdikti'
                    }, {
                        id: 'bio-2',
                        title: 'Pengembangan Vaksin DNA Generasi Baru',
                        lead: 'Dr. Bambang Sugiono',
                        summary: 'Riset ini bertujuan mengembangkan platform vaksin DNA yang stabil, mudah diproduksi, dan efektif melawan penyakit menular baru. Fokus saat ini adalah pada virus influenza dan dengue.',
                        status: 'Berjalan',
                        year: 2024,
                        collaborators: ['Bio Farma'],
                        funding: 'LPDP'
                    }, {
                        id: 'bio-3',
                        title: 'Biologi Sintetis untuk Produksi Biofuel',
                        lead: 'Sari Puspita, M.Sc.',
                        summary: 'Memanfaatkan rekayasa genetika pada mikroalga untuk meningkatkan produksi lipid sebagai bahan baku biofuel. Penelitian ini mencari jalur metabolik yang paling efisien dan tahan terhadap kondisi lingkungan.',
                        status: 'Selesai',
                        year: 2022,
                        collaborators: ['Pertamina Research Center'],
                        funding: 'Internal'
                    }]
                },
                {
                    category: 'Material Maju',
                    researches: [{
                        id: 'mat-1',
                        title: 'Sintesis Graphene untuk Superkapasitor',
                        lead: 'Dr. Eng. Rendra Pratama',
                        summary: 'Mengembangkan metode sintesis graphene berkualitas tinggi dengan biaya rendah untuk aplikasi penyimpanan energi, khususnya pada superkapasitor generasi berikutnya. Tujuannya adalah mencapai kepadatan energi yang tinggi.',
                        status: 'Berjalan',
                        year: 2023,
                        collaborators: ['Institut Teknologi Bandung', 'LIPI'],
                        funding: 'LPDP'
                    }, {
                        id: 'mat-2',
                        title: 'Nanokomposit Polimer untuk Sensor Gas',
                        lead: 'Dr. Indah Cahyani',
                        summary: 'Membuat material komposit berbasis polimer dan nanopartikel logam oksida yang memiliki sensitivitas dan selektivitas tinggi untuk mendeteksi gas berbahaya seperti CO dan NOx di lingkungan.',
                        status: 'Selesai',
                        year: 2023,
                        collaborators: ['Pusat Penelitian Elektronika dan Telekomunikasi (PPET) LIPI'],
                        funding: 'Riset Unggulan'
                    }, {
                        id: 'mat-3',
                        title: 'Fotokatalis TiO2 untuk Degradasi Polutan',
                        lead: 'Gilang Ramadhan, M.Eng.',
                        summary: 'Meneliti modifikasi permukaan Titanium Dioksida (TiO2) untuk meningkatkan aktivitas fotokatalitiknya di bawah sinar tampak. Aplikasi utama adalah untuk mendegradasi polutan organik di air limbah industri.',
                        status: 'Selesai',
                        year: 2021,
                        collaborators: [],
                        funding: 'Hibah Internal'
                    }]
                },
                {
                    category: 'Kecerdasan Buatan',
                    researches: [{
                        id: 'ai-1',
                        title: 'Model Prediksi Penyakit Berbasis AI',
                        lead: 'Dr. Agus Purnomo',
                        summary: 'Mengembangkan model machine learning untuk memprediksi risiko penyakit jantung koroner berdasarkan data rekam medis elektronik. Model ini menggunakan arsitektur deep learning untuk akurasi yang lebih tinggi.',
                        status: 'Berjalan',
                        year: 2024,
                        collaborators: ['RS Jantung Harapan Kita'],
                        funding: 'Kemenristekdikti'
                    }]
                }
            ];

            const icons = {
                Dna: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M4 14.5A3.5 3.5 0 0 1 7.5 11H11a3.5 3.5 0 0 1 3.5 3.5v0A3.5 3.5 0 0 1 11 18H7.5A3.5 3.5 0 0 1 4 14.5z"/><path d="M15 4.5A3.5 3.5 0 0 1 18.5 1H22a3.5 3.5 0 0 1 3.5 3.5v0A3.5 3.5 0 0 1 22 8h-3.5a3.5 3.5 0 0 1-3.5-3.5z"/><path d="m15 13 .4-.4a3.5 3.5 0 0 1 5 5l-.4.4"/><path d="m4 5 .4.4a3.5 3.5 0 0 1 5-5l.4-.4"/></svg>',
                FlaskConical: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M10 2v7.31"/><path d="M14 9.31V2"/><path d="M8.5 2h7"/><path d="M14 9.31C16.57 10.22 18 12.24 18 15v5a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-5c0-2.76 1.43-4.78 4-5.69Z"/></svg>',
                Zap: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>',
                CheckCircle2: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 h-4 w-4"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="m9 12 2 2 4-4"/></svg>',
                User: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>',
                FileText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-primary"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><line x1="10" x2="8" y1="9" y2="9"/></svg>',
                Info: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-primary"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="16" y2="12"/><line x1="12" x2="12.01" y1="8" y2="8"/></svg>',
                Calendar: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-primary/80"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>',
                DollarSign: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-primary/80"><line x1="12" x2="12" y1="2" y2="22"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>',
                Building: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-primary/80 flex-shrink-0"><rect x="2" y="2" width="20" height="20" rx="2"/><path d="M9 22v-4h6v4"/><path d="M8 6h.01"/><path d="M16 6h.01"/><path d="M12 6h.01"/><path d="M12 10h.01"/><path d="M12 14h.01"/><path d="M16 10h.01"/><path d="M16 14h.01"/><path d="M8 10h.01"/><path d="M8 14h.01"/></svg>'
            };

            const categoryListContainer = document.getElementById('category-list');
            const researchListContainer = document.getElementById('research-list');
            const researchDetailContainer = document.getElementById('research-detail-container');
            const researchListDescription = document.getElementById('research-list-description');

            let selectedCategory = researchData[0];
            let selectedResearch = researchData[0].researches[0];

            function getIconForCategory(categoryName) {
                if (categoryName === 'Bioteknologi') return icons.Dna;
                if (categoryName === 'Material Maju') return icons.FlaskConical;
                if (categoryName === 'Kecerdasan Buatan') return icons.Zap;
                return icons.Info;
            }

            function renderResearchDetail() {
                if (!selectedResearch) {
                    researchDetailContainer.innerHTML = `
                        <div class="rounded-lg border bg-white shadow-sm sticky-card flex items-center justify-center h-96">
                            <p class="text-muted-foreground">Pilih riset untuk melihat detail.</p>
                        </div>`;
                    return;
                }

                const collaboratorsHtml = selectedResearch.collaborators && selectedResearch.collaborators.length >
                    0 ? `
                    <div class="flex items-start gap-3 md:col-span-2">
                        ${icons.Building}
                        <div>
                            <p class="text-sm text-muted-foreground">Kolaborator</p>
                            <div class="flex flex-wrap gap-2 mt-1">
                                ${selectedResearch.collaborators.map(collab => `<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-secondary text-secondary-foreground">${collab}</span>`).join('')}
                            </div>
                        </div>
                    </div>` : '';

                const statusBadgeClass = selectedResearch.status === 'Selesai' ?
                    'bg-accent text-accent-foreground' : 'bg-secondary text-secondary-foreground';
                const statusIcon = selectedResearch.status === 'Selesai' ? icons.CheckCircle2 : icons.Zap.replace(
                    'w-5 h-5', 'mr-2 h-4 w-4');

                researchDetailContainer.innerHTML = `
                    <div class="rounded-lg border bg-white shadow-sm sticky-card">
                        <div class="p-6">
                            <div class="flex justify-between items-start gap-4">
                                <h3 class="text-2xl lg:text-3xl font-headline">${selectedResearch.title}</h3>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium whitespace-nowrap ${statusBadgeClass}">
                                    ${statusIcon} ${selectedResearch.status}
                                </span>
                            </div>
                            <p class="text-md pt-2 flex items-center gap-2 text-muted-foreground">
                                ${icons.User}
                                <span>Pimpinan Riset: ${selectedResearch.lead}</span>
                            </p>
                        </div>
                        <div class="p-6 pt-4 space-y-6">
                            <div class="border-t pt-6">
                                <h4 class="font-semibold mb-3 text-lg flex items-center gap-2.5">${icons.FileText}Ringkasan Proyek</h4>
                                <p class="text-foreground-80 leading-relaxed pl-8">${selectedResearch.summary}</p>
                            </div>
                            <div class="border-t pt-6">
                                <h4 class="font-semibold mb-4 text-lg flex items-center gap-2.5">${icons.Info}Detail Informasi</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-4 pl-8">
                                    <div class="flex items-center gap-3">
                                        ${icons.Calendar}
                                        <div><p class="text-sm text-muted-foreground">Tahun</p><p class="font-semibold">${selectedResearch.year}</p></div>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        ${icons.DollarSign}
                                        <div><p class="text-sm text-muted-foreground">Sumber Pendanaan</p><p class="font-semibold">${selectedResearch.funding}</p></div>
                                    </div>
                                    ${collaboratorsHtml}
                                </div>
                            </div>
                        </div>
                    </div>`;
            }

            function renderResearchList() {
                researchListContainer.innerHTML = '';
                researchListDescription.textContent = selectedCategory.category;
                selectedCategory.researches.forEach(research => {
                    const button = document.createElement('button');
                    button.innerHTML = research.title;
                    button.className = 'p-3 rounded-lg text-left transition-colors text-sm w-full';
                    if (selectedResearch && selectedResearch.id === research.id) {
                        button.classList.add('bg-primary-10', 'text-primary', 'font-semibold');
                    } else {
                        button.classList.add('hover:bg-gray-100');
                    }
                    button.onclick = () => {
                        selectedResearch = research;
                        renderResearchList();
                        renderResearchDetail();
                    };
                    researchListContainer.appendChild(button);
                });
            }

            function renderCategoryList() {
                categoryListContainer.innerHTML = '';
                researchData.forEach(category => {
                    const button = document.createElement('button');
                    const icon = getIconForCategory(category.category);
                    button.innerHTML = `${icon} <span>${category.category}</span>`;
                    button.className =
                        'w-full inline-flex items-center justify-start text-left p-3 rounded-lg gap-3 transition-colors';
                    if (selectedCategory.category === category.category) {
                        button.classList.add('bg-primary', 'text-primary-foreground');
                    } else {
                        button.classList.add('hover:bg-gray-100');
                    }
                    button.onclick = () => {
                        selectedCategory = category;
                        selectedResearch = category.researches[0] || null;
                        renderCategoryList();
                        renderResearchList();
                        renderResearchDetail();
                    };
                    categoryListContainer.appendChild(button);
                });
            }

            // Initial Render
            // renderCategoryList();
            // renderResearchList();
            renderResearchDetail();
        });
    </script>
@endsection
