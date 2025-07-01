@extends('layout.main')

@section('content')

<body class="font-body antialiased bg-background">
    <div class="flex flex-col min-h-screen">

        <main class="flex-1 py-12 md:py-24">
            <div class="container mx-auto px-4 md:px-6">
                <div class="text-center mb-16">
                    <h1 class="text-4xl font-bold tracking-tighter sm:text-5xl text-primary font-headline">
                        Eksplorasi Riset Unggulan
                    </h1>
                    <p class="max-w-[800px] mx-auto text-foreground/80 md:text-xl mt-4">
                        Selami lebih dalam inovasi dan penemuan yang membentuk masa depan melalui proyek penelitian
                        kami.
                    </p>
                </div>

                <div class="grid lg:grid-cols-12 gap-8 lg:gap-12">
                    <div class="lg:col-span-4 xl:col-span-3 space-y-8">
                    </div>
                    <div class="lg:col-span-8 xl:col-span-9">
                    </div>
                </div>
            </div>
        </main>

        <footer class="bg-primary text-primary-foreground">
            <div
                class="container mx-auto px-4 py-8 md:px-6 flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="h-6 w-6">
                        <path d="M10 2v7.31" />
                        <path d="M14 9.31V2" />
                        <path
                            d="M12 22a7 7 0 0 0 7-7c0-2-1-3.7-3-5.2-1.4-1-3-2.3-3-3.8V2a2 2 0 0 0-4 0v1.3c0 1.5-1.6 2.8-3 3.8-2 1.5-3 3.3-3 5.2a7 7 0 0 0 7 7Z" />
                    </svg>
                    <span class="font-bold text-lg">LabConnect</span>
                </div>
                <p class="text-sm text-primary-foreground/80 text-center">
                    © 2024 LabConnect. All rights reserved.
                </p>
            </div>
        </footer>
    </div>
    <script>
        // Data dan logika JavaScript akan ditempatkan di sini untuk mengelola state dan event.
    </script>
    
    @endsection