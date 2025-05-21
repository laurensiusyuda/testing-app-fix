<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Aplikasi Logistik</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="min-h-screen flex flex-col items-center justify-center px-4">
        <h1 class="text-4xl font-bold mb-4">Selamat Datang di Sistem Logistik</h1>

        <p class="mb-6 text-lg text-gray-600">Kelola barang & penjualan dengan mudah dan cepat.</p>

        @auth
            <a href="{{ route('dashboard') }}" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                Masuk ke Dashboard
            </a>
        @else
            <div class="flex gap-4">
                <a href="{{ route('login') }}" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                    Login
                </a>
                <a href="{{ route('register') }}" class="bg-gray-300 text-gray-800 px-6 py-2 rounded hover:bg-gray-400 transition">
                    Daftar
                </a>
            </div>
        @endauth
    </div>
</body>
</html>
