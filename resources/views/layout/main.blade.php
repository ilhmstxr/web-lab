<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/img/icon-sisfo.jpg" rel="icon">
    <title>Lab Sistem Informasi - UPNVJT</title>

    <meta name="google-site-verification" content="3hrCIV-4M-sGGDBara3fNtbqnRi0ySq0Qgd8FPq9CG4" />
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/v4-shims.min.css">

    @vite('resources/css/app.css')
</head>

<body class="bg-white text-gray-800 font-sans">
    @include('layout.navbar')

    <main class="flex-1">
        @yield('content')
    </main>
    @include('public.partials.footer')

    <div class="gtranslate_wrapper"></div>

    <script>
        window.gtranslateSettings = {
            "default_language": "id",
            "detect_browser_language": true,
            "wrapper_selector": ".gtranslate_wrapper",
            "switcher_horizontal_position": "right",
            "flag_style": "3d"
        }
    </script>
    <script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>
</body>
