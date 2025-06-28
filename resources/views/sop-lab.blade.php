<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Standar Operasional Prosedur (SOP)</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .accordion-content { max-height: 0; overflow: hidden; transition: max-height 0.3s ease-in-out; }
    </style>
</head>
<body class="bg-white text-gray-800">
    <div class="flex flex-col min-h-screen">
        <header class="sticky top-0 z-50 w-full bg-white/80 backdrop-blur-sm shadow-md">
            <div class="container mx-auto flex h-16 items-center justify-between px-4 md:px-6">
                <a href="#" class="flex items-center gap-2 font-bold text-lg text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6"><path d="M10 2v7.31"/><path d="M14 9.31V2"/><path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.7-3-5.2-1.4-1-3-2.3-3-3.8V2a2 2 0 0 0-4 0v1.3c0 1.5-1.6 2.8-3 3.8-2 1.5-3 3.3-3 5.2a7 7 0 0 0 7 7Z"/></svg>
                    <span>LabConnect</span>
                </a>
            </div>
        </header>

        <main class="flex-1 py-12 md:py-24 lg:py-32">
            <div class="container mx-auto px-4 md:px-6">
                <div class="text-center mb-12">
                    <h1 class="text-4xl font-bold tracking-tighter sm:text-5xl text-blue-600">Standar Operasional Prosedur (SOP)</h1>
                    <p class="max-w-[800px] mx-auto text-gray-600 md:text-xl mt-4">
                        Panduan penting untuk memastikan keselamatan, efisiensi, dan integritas penelitian di laboratorium kami.
                    </p>
                </div>

                <div class="max-w-4xl mx-auto border rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-blue-600"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><line x1="10" y1="9" x2="8" y2="9"/></svg>
                            <div>
                                <h2 class="text-xl font-semibold">Dokumen SOP Laboratorium</h2>
                                <p class="text-gray-500">Setiap pengguna laboratorium wajib memahami dan mematuhi SOP yang berlaku.</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 border-t">
                        <div class="space-y-2">
                            <div class="border-b">
                                <button class="accordion-trigger flex justify-between items-center w-full py-4 text-left text-lg">
                                    <span class="font-medium">Prosedur Keselamatan Umum</span>
                                    </button>
                                <div class="accordion-content">
                                    <ul class="list-disc space-y-2 pl-10 pb-4 text-gray-600">
                                        <li>Selalu kenakan jas laboratorium, kacamata pengaman, dan sepatu tertutup di dalam area lab.</li>
                                        <li>Dilarang makan, minum, atau merokok di dalam laboratorium.</li>
                                        <li>Ketahui lokasi alat pemadam api, shower keselamatan, dan kotak P3K.</li>
                                        <li>Laporkan setiap insiden atau tumpahan bahan kimia kepada penanggung jawab lab segera.</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="border-b">
                                <button class="accordion-trigger flex justify-between items-center w-full py-4 text-left text-lg">
                                    <span class="font-medium">Penanganan Bahan Kimia</span>
                                </button>
                                <div class="accordion-content">
                                     <ul class="list-disc space-y-2 pl-10 pb-4 text-gray-600">
                                        <li>Baca Label Keamanan (MSDS/SDS) sebelum menggunakan bahan kimia baru.</li>
                                        <li>Gunakan lemari asam (fume hood) saat bekerja dengan bahan kimia yang mudah menguap atau beracun.</li>
                                        <li>Jangan pernah mencampur bahan kimia secara sembarangan.</li>
                                     </ul>
                                </div>
                            </div>
                            </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="bg-blue-600 text-white mt-auto">
            <div class="container mx-auto py-4 px-4 md:px-6 text-center">
                 <p class="text-sm">© 2024 LabConnect. All rights reserved.</p>
            </div>
        </footer>
    </div>
    <script>
        document.querySelectorAll('.accordion-trigger').forEach(button => {
            button.addEventListener('click', () => {
                const content = button.nextElementSibling;
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + 'px';
                } 
            })
        });
    </script>
</body>
</html>