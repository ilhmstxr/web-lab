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
    @include('public.partials.footer')

</body>
