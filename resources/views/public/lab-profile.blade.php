<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Laboratorium</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="google-site-verification" content="3hrCIV-4M-sGGDBara3fNtbqnRi0ySq0Qgd8FPq9CG4" />
    <link rel="stylesheet" href="path/to/your/globals.css">
    <style>
        /* Sembunyikan semua tab content secara default */
        .tab-content { display: none; }
        /* Tampilkan tab content yang aktif */
        .tab-content.active { display: block; }
        /* Style untuk tombol tab aktif */
        .tab-trigger.active { background-color: #000; color: #fff; }
    </style>
</head>
<body class="bg-background text-foreground">
    <div class="flex flex-col min-h-screen">
        <header class="sticky top-0 z-50 w-full bg-card/80 backdrop-blur-sm shadow-md">
            </header>

        <main class="flex-1 py-12 md:py-24 lg:py-32">
            <div class="container mx-auto px-4 md:px-6">
                <div class="text-center mb-12">
                    <h1 class="text-4xl font-bold tracking-tighter sm:text-5xl text-primary font-headline">
                        Profil Laboratorium
                    </h1>
                    <p class="max-w-[700px] mx-auto text-foreground/80 md:text-xl mt-4">
                        Temukan pusat-pusat penelitian unggulan kami, tempat inovasi dan penemuan terjadi.
                    </p>
                </div>

                <div class="w-full">
                    <div class="grid w-full grid-cols-2 border-b">
                        <button class="tab-trigger p-4 text-center font-medium active" onclick="switchTab(event, 'lab-1')">Lab Bioteknologi Molekuler</button>
                        <button class="tab-trigger p-4 text-center font-medium" onclick="switchTab(event, 'lab-2')">Lab Material Maju</button>
                    </div>

                    <div id="lab-1" class="tab-content active mt-6">
                        <div class="card border-0 shadow-none p-0 space-y-16">
                            <section>
                                <h2 class="text-3xl font-bold font-headline mb-4">Laboratorium Bioteknologi Molekuler</h2>
                                <p class="text-foreground/80 leading-relaxed">Fokus pada rekayasa genetika dan pengembangan terapi inovatif. Kami memanfaatkan teknologi CRISPR-Cas9 dan sekuensing generasi berikutnya untuk memahami dan memanipulasi sistem biologis pada tingkat molekuler.</p>
                            </section>
                            </div>
                    </div>

                    <div id="lab-2" class="tab-content mt-6">
                        <div class="card border-0 shadow-none p-0 space-y-16">
                            <section>
                                <h2 class="text-3xl font-bold font-headline mb-4">Laboratorium Material Maju & Nanoteknologi</h2>
                                <p class="text-foreground/80 leading-relaxed">Berdedikasi pada sintesis dan karakterisasi material baru dengan sifat unggul untuk aplikasi di bidang energi, lingkungan, dan elektronik. Kami mengeksplorasi material 2D, komposit, dan nanopartikel.</p>
                            </section>
                            </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="bg-primary text-primary-foreground">
        </footer>
    </div>

    <script>
        function switchTab(event, tabId) {
            // Sembunyikan semua tab-content
            const tabContents = document.querySelectorAll('.tab-content');
            tabContents.forEach(content => {
                content.style.display = 'none';
                content.classList.remove('active');
            });

            // Non-aktifkan semua tombol tab
            const tabTriggers = document.querySelectorAll('.tab-trigger');
            tabTriggers.forEach(trigger => {
                trigger.classList.remove('active');
            });
            
            // Tampilkan tab-content yang dipilih
            document.getElementById(tabId).style.display = 'block';
            document.getElementById(tabId).classList.add('active');

            // Aktifkan tombol yang diklik
            event.currentTarget.classList.add('active');
        }
    </script>
</body>
</html>