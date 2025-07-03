<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LabConnect - Profil Laboratorium Modern</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800 font-sans">
    
    <header class="sticky top-0 z-50 w-full transition-all duration-300 bg-white/80 backdrop-blur-sm shadow-md">
        <div class="container mx-auto flex h-16 items-center justify-between px-4 md:px-6">
            <a href="#home" class="flex items-center gap-2 font-bold text-lg text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6"><path d="M10 2v7.31"/><path d="M14 9.31V2"/><path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.7-3-5.2-1.4-1-3-2.3-3-3.8V2a2 2 0 0 0-4 0v1.3c0 1.5-1.6 2.8-3 3.8-2 1.5-3 3.3-3 5.2a7 7 0 0 0 7 7Z"/></svg>
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

    <main class="flex-1">

        <section id="home" class="w-full py-20 lg:py-32 bg-white">
            <div class="container mx-auto px-4 md:px-6">
                <div class="grid gap-10 lg:grid-cols-2 lg:gap-16 items-center">
                    <div class="space-y-4">
                        <h1 class="text-4xl font-bold tracking-tighter sm:text-5xl md:text-6xl text-blue-600">
                            Selamat Datang di LabConnect
                        </h1>
                        <p class="max-w-[600px] text-gray-600 md:text-xl">
                            Pusat inovasi dan penelitian terdepan. Kami mendedikasikan diri untuk memajukan ilmu pengetahuan dan teknologi melalui kolaborasi dan penemuan.
                        </p>
                        <a href="#about" class="inline-block bg-green-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-600">
                            Jelajahi Lebih Lanjut
                        </a>
                    </div>
                    <div class="grid gap-6">
                        <div class="border rounded-lg p-6 shadow-sm">
                            <div class="flex flex-row items-center gap-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-blue-600"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>
                                <h2 class="text-xl font-semibold">Misi Kami</h2>
                            </div>
                            <p class="text-gray-600 mt-2">
                                Mendorong batas-batas pengetahuan melalui penelitian inovatif dan pendidikan berkualitas tinggi.
                            </p>
                        </div>
                        <div class="border rounded-lg p-6 shadow-sm">
                            <div class="flex flex-row items-center gap-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-blue-600"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.3.09-3.1a2.12 2.12 0 0 0-.09-3.11c.7-1.12.7-2.58 0-3.56S3 4.24 3 4.24s3.74-.5 5-2c.71-.84.7-2.3.09-3.1a2.12 2.12 0 0 0-.09-3.11c.7-1.12.7-2.58 0-3.56s-2.81-1.2-3.41-1.87"/><path d="M19.5 16.5c1.5 1.26 2 5 2 5s-3.74-.5-5-2c-.71-.84-.7-2.3-.09-3.1a2.12 2.12 0 0 1 .09-3.11c-.7-1.12-.7-2.58 0-3.56s2.81-1.2 3.41-1.87"/><path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.7-3-5.2-1.4-1-3-2.3-3-3.8V2a2 2 0 0 0-4 0v1.3c0 1.5-1.6 2.8-3 3.8-2 1.5-3 3.3-3 5.2a7 7 0 0 0 7 7Z"/></svg>
                                <h2 class="text-xl font-semibold">Visi Kami</h2>
                            </div>
                            <p class="text-gray-600 mt-2">
                                Menjadi laboratorium riset yang diakui secara global, yang memberikan dampak signifikan bagi masyarakat dan industri.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class="w-full py-20 lg:py-32 bg-gray-50">
            <div class="container mx-auto px-4 md:px-6 space-y-12">
                <div class="text-center space-y-4">
                    <h2 class="text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl">Tentang Program Studi</h2>
                    <p class="mx-auto max-w-[700px] text-gray-600 md:text-xl">
                        Pelajari lebih lanjut tentang program studi, kurikulum, dan peluang riset yang kami tawarkan.
                    </p>
                </div>
                </div>
        </section>

    <section id="lab" class="w-full py-20 lg:py-32 bg-white">
        <div class="container mx-auto px-4 md:px-6 space-y-12">
            <div class="text-center space-y-4">
                <h2 class="text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl">Detail Laboratorium</h2>
                <p class="mx-auto max-w-[700px] text-gray-600 md:text-xl">
                    Jelajahi fasilitas modern, kegiatan riset, dan tim ahli kami.
                </p>
            </div>
        </div>
    </section>

        <section id="students" class="w-full py-20 lg:py-32 bg-gray-50">
            <div class="container mx-auto px-4 md:px-6 space-y-12">
                <div class="text-center space-y-4">
                    <h2 class="text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl">Gerakan Mahasiswa</h2>
                    <p class="mx-auto max-w-[700px] text-gray-600 md:text-xl">
                        Wadah bagi mahasiswa untuk berkreasi, berkolaborasi, dan mengembangkan diri di luar kelas.
                    </p>
                </div>
                 </div>
        </section>

    </main>

    <footer class="bg-blue-600 text-white">
        <div class="container mx-auto px-4 py-8 md:px-6 flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6"><path d="M10 2v7.31"/><path d="M14 9.31V2"/><path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.7-3-5.2-1.4-1-3-2.3-3-3.8V2a2 2 0 0 0-4 0v1.3c0 1.5-1.6 2.8-3 3.8-2 1.5-3 3.3-3 5.2a7 7 0 0 0 7 7Z"/></svg>
                <span class="font-bold text-lg">LabConnect</span>
            </div>
            <p class="text-sm text-blue-100 text-center">
                © 2025 LabConnect. All rights reserved.
            </p>
            <div class="flex items-center gap-4">
                <a href="#" class="text-blue-100 hover:text-white">Twitter</a>
                <a href="#" class="text-blue-100 hover:text-white">LinkedIn</a>
                <a href="#" class="text-blue-100 hover:text-white">Facebook</a>
            </div>
        </div>
    </footer>

</body>
</html>