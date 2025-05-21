<!-- layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav>
        <ul>
            <li><a href="/dashboard">Dashboard</a></li>
            <li><a href="/barang">Daftar Barang</a></li>
            <li><a href="/penjualan">Penjualan</a></li>
        </ul>
    </nav>

    <div class="container mx-auto py-8">
        @yield('content')
    </div>
</body>
</html>
