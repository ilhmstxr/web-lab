<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LabConnect - Profil Laboratorium Modern</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-800 font-sans">

    <!-- Header -->
    <header class="sticky top-0 z-50 w-full bg-white/80 backdrop-blur shadow-md">
        <div class="container mx-auto flex h-16 items-center justify-between px-4 md:px-6">
            <a href="#home" class="flex items-center gap-2 text-blue-600 font-bold text-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path
                        d="M10 2v7.31M14 9.31V2M12 22a7 7 0 007-7c0-2-1-3.7-3-5.2-1.4-1-3-2.3-3-3.8V2a2 2 0 00-4 0v1.3c0 1.5-1.6 2.8-3 3.8-2 1.5-3 3.3-3 5.2a7 7 0 007 7z" />
                </svg>
                <span>LabConnect</span>
            </a>
            <nav class="hidden md:flex items-center gap-6">
                <a href="#home" class="text-sm font-medium text-gray-600 hover:text-blue-600">Beranda</a>
                <a href="#about" class="text-sm font-medium text-gray-600 hover:text-blue-600">Tentang Prodi</a>
                <a href="#lab" class="text-sm font-medium text-gray-600 hover:text-blue-600">Lab Prodi</a>
                <a href="#students" class="text-sm font-medium text-gray-600 hover:text-blue-600">Gerakan Mahasiswa</a>
            </nav>
        </div>
    </header>

    <!-- Main -->
    <main class="flex-1">

        <!-- Hero Section -->
        <section id="home" class="w-full py-20 lg:py-32 bg-white">
            <div class="container mx-auto px-4 md:px-6 grid gap-10 lg:grid-cols-2 lg:gap-16 items-center">
                <div class="space-y-4">
                    <h1 class="text-4xl font-bold tracking-tight sm:text-5xl md:text-6xl text-blue-600">
                        Selamat Datang di LabConnect
                    </h1>
                    <p class="max-w-xl text-gray-600 md:text-xl">
                        Pusat inovasi dan penelitian terdepan. Kami mendedikasikan diri untuk memajukan ilmu pengetahuan
                        dan teknologi melalui kolaborasi dan penemuan.
                    </p>
                    <a href="#about"
                        class="inline-block bg-green-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-600">
                        Jelajahi Lebih Lanjut
                    </a>
                </div>
                <div class="grid gap-6">
                    <!-- Misi -->
                    <div class="border rounded-lg p-6 shadow-sm">
                        <div class="flex items-center gap-4">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10" />
                                <circle cx="12" cy="12" r="6" />
                                <circle cx="12" cy="12" r="2" />
                            </svg>
                            <h2 class="text-xl font-semibold">Misi Kami</h2>
                        </div>
                        <p class="text-gray-600 mt-2">
                            Mendorong batas-batas pengetahuan melalui penelitian inovatif dan pendidikan berkualitas
                            tinggi.
                        </p>
                    </div>
                    <!-- Visi -->
                    <div class="border rounded-lg p-6 shadow-sm">
                        <div class="flex items-center gap-4">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 22a7 7 0 0 0 7-7c0-2-1-3.7-3-5.2-1.4-1-3-2.3-3-3.8V2a2 2 0 0 0-4 0v1.3c0 1.5-1.6 2.8-3 3.8-2 1.5-3 3.3-3 5.2a7 7 0 0 0 7 7Z" />
                            </svg>
                            <h2 class="text-xl font-semibold">Visi Kami</h2>
                        </div>
                        <p class="text-gray-600 mt-2">
                            Menjadi laboratorium riset yang diakui secara global dan berdampak bagi masyarakat serta
                            industri.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tentang Prodi -->
        <section id="about" class="w-full py-20 lg:py-32 bg-gray-50">
            <div class="container mx-auto px-4 md:px-6 space-y-12 text-center">
                <h2 class="text-3xl font-bold tracking-tight sm:text-4xl md:text-5xl">Tentang Program Studi</h2>
                <p class="mx-auto max-w-2xl text-gray-600 md:text-xl">
                    Pelajari lebih lanjut tentang program studi, kurikulum, dan peluang riset yang kami tawarkan.
                </p>
            </div>
        </section>

        <!-- Lab Prodi -->
        <section id="lab" class="w-full py-20 lg:py-32 bg-white">
            <div class="container mx-auto px-4 md:px-6 space-y-12 text-center">
                <h2 class="text-3xl font-bold tracking-tight sm:text-4xl md:text-5xl">Detail Laboratorium</h2>
                <p class="mx-auto max-w-2xl text-gray-600 md:text-xl">
                    Jelajahi fasilitas modern, kegiatan riset, dan tim ahli kami.
                </p>
            </div>
        </section>

        <!-- Gerakan Mahasiswa -->
        <section id="students" class="w-full py-20 lg:py-32 bg-gray-50">
            <div class="container mx-auto px-4 md:px-6 space-y-12 text-center">
                <h2 class="text-3xl font-bold tracking-tight sm:text-4xl md:text-5xl">Gerakan Mahasiswa</h2>
                <p class="mx-auto max-w-2xl text-gray-600 md:text-xl">
                    Wadah bagi mahasiswa untuk berkreasi, berkolaborasi, dan mengembangkan diri di luar kelas.
                </p>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white">
        <div class="container mx-auto px-4 py-8 md:px-6 flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path
                        d="M10 2v7.31M14 9.31V2M12 22a7 7 0 007-7c0-2-1-3.7-3-5.2-1.4-1-3-2.3-3-3.8V2a2 2 0 00-4 0v1.3c0 1.5-1.6 2.8-3 3.8-2 1.5-3 3.3-3 5.2a7 7 0 007 7z" />
                </svg>
                <span class="font-bold text-lg">LabConnect</span>
            </div>
            <p class="text-sm text-blue-100 text-center">© 2025 LabConnect. All rights reserved.</p>
            <div class="flex items-center gap-4">
                <a href="#" class="text-blue-100 hover:text-white">Twitter</a>
                <a href="#" class="text-blue-100 hover:text-white">LinkedIn</a>
                <a href="#" class="text-blue-100 hover:text-white">Facebook</a>
            </div>
        </div>
    </footer>

</body>

</html>