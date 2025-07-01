
@extends('layout.main')

@section('content')
{{-- <body class="bg-background text-foreground"> --}}
    <div class="flex flex-col min-h-screen">

        <main class="flex-1 py-12 md:py-24 lg:py-32">
            <div class="container mx-auto px-4 md:px-6">
                <div class="text-center mb-12">
                    <h1 class="text-4xl font-bold tracking-tighter sm:text-5xl text-primary font-headline">
                        Absensi Kehadiran Laboratorium
                    </h1>
                    <p class="max-w-[800px] mx-auto text-foreground/80 md:text-xl mt-4">
                        Sistem pencatatan kehadiran digital untuk keamanan dan administrasi.
                    </p>
                </div>

                <div class="max-w-4xl mx-auto grid md:grid-cols-2 gap-8 items-center">
                    <div class="card flex flex-col items-center justify-center text-center p-8">
                        <div class="card-header">
                            <div class="p-4 bg-primary/10 rounded-full mx-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-16 h-16 text-primary">
                                    <rect width="5" height="5" x="3" y="3" rx="1" />
                                    <rect width="5" height="5" x="16" y="3" rx="1" />
                                    <rect width="5" height="5" x="3" y="16" rx="1" />
                                    <path d="M21 16h-3a2 2 0 0 0-2 2v3" />
                                    <path d="M21 21v.01" />
                                    <path d="M12 7v3a2 2 0 0 1-2 2H7" />
                                    <path d="M3 12h.01" />
                                    <path d="M12 3h.01" />
                                    <path d="M12 16v.01" />
                                    <path d="M16 12h.01" />
                                    <path d="M21 12h.01" />
                                    <path d="M12 21h.01" />
                                </svg>
                            </div>
                            <h2 class="card-title mt-4 text-2xl">Pindai Kode QR</h2>
                        </div>
                        <div class="card-content">
                            <p class="text-foreground/80">
                                Gunakan kamera ponsel Anda untuk memindai kode QR yang tersedia di pintu masuk dan
                                keluar laboratorium untuk mencatat kehadiran Anda.
                            </p>
                        </div>
                        <div class="card-footer">
                            <button class="btn bg-primary text-primary-foreground">Buka Pemindai (Contoh)</button>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="card">
                            <div class="card-header flex-row gap-4 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="w-8 h-8 text-accent flex-shrink-0">
                                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                                    <polyline points="10 17 15 12 10 7" />
                                    <line x1="15" x2="3" y1="12" y2="12" />
                                </svg>
                                <div>
                                    <h3 class="card-title">Prosedur Masuk</h3>
                                    <p class="card-description">Langkah-langkah saat memasuki lab.</p>
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="text-foreground/80">
                                    Sebelum memulai aktivitas, pastikan Anda memindai kode QR 'MASUK' untuk mencatat
                                    waktu kedatangan Anda.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header flex-row gap-4 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="w-8 h-8 text-destructive flex-shrink-0">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                    <polyline points="16 17 21 12 16 7" />
                                    <line x1="21" x2="9" y1="12" y2="12" />
                                </svg>
                                <div>
                                    <h3 class="card-title">Prosedur Keluar</h3>
                                    <p class="card-description">Langkah-langkah saat meninggalkan lab.</p>
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="text-foreground/80">
                                    Setelah selesai, jangan lupa untuk memindai kode QR 'KELUAR' untuk mencatat waktu
                                    kepulangan Anda.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    {{-- </div> --}}
@endsection