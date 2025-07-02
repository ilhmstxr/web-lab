<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/img/icon-sisfo.jpg" rel="icon">
    <title>Lab Sistem Informasi - UPNVJT</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-white text-gray-800 font-sans">
    @include('layout.navbar')

    <main class="flex-1">
        @yield('content')
    </main>
    @include('layout.footer')

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
