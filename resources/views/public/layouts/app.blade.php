<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="3hrCIV-4M-sGGDBara3fNtbqnRi0ySq0Qgd8FPq9CG4" />
    <title>@yield('title', 'TechLab University')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Di bagian <head> -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<!-- Sebelum </body> -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    AOS.init();
    AOS.refresh();
  });
</script>
    <script src="https://cdn.tailwindcss.com "></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1e40af',
                        secondary: '#3b82f6',
                        accent: '#f59e0b',
                        dark: '#1f2937'
                    }
                }
            }
        }
    </script>
    @stack('styles')
</head>
<body class="bg-gray-50">
    @include('layout.navbar')

    @yield('content')

    @include('public.partials.footer')

    @stack('scripts')
</body>
</html>