<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Web Lab') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100 text-gray-800">
    <div class="min-h-screen">

        <!-- Navbar -->
        <nav class="bg-white px-6 py-4 shadow">
            <div class="flex justify-between items-center max-w-7xl mx-auto">
                <a href="/" class="font-bold text-lg text-gray-800 hover:text-blue-600">Web Lab</a>
                <div class="space-x-4">
                    @auth
                        <a href="{{ url('/admin') }}" class="text-sm text-blue-600 font-medium hover:underline">
                            Dashboard
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-sm text-red-600 font-medium hover:underline">
                                Logout
                            </button>
                        </form>
                    @endauth

                    @guest
                        <a href="{{ route('login') }}" class="text-sm text-blue-600 font-medium hover:underline">
                            Login
                        </a>
                    @endguest
                </div>
            </div>
        </nav>

        <!-- Page Header (opsional) -->
        @hasSection('header')
            <header class="bg-gray-50 border-b shadow-sm">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    @yield('header')
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="py-8">
            @yield('content')
        </main>

    </div>
</body>

</html>