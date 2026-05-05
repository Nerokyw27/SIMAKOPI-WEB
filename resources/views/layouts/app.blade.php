<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="SIMAKOPI - Sistem Informasi Manajemen Operasional Kopi untuk Monitoring Produksi dan Penjualan Produk oleh PT Nawasena Group">
    <title>@yield('title', 'SIMAKOPI - Sistem Informasi Manajemen Operasional Kopi')</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @stack('styles')
</head>
<body>
    {{-- Navbar --}}
    @include('layouts.navbar')

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.footer')

    {{-- Toast from session flash --}}
    @if(session('toast'))
    <script>
        window.__TOAST__ = @json(session('toast'));
    </script>
    @endif

    @if(session('show_login'))
    <script>
        window.__SHOW_LOGIN__ = true;
    </script>
    @endif

    @stack('scripts')
</body>
</html>
