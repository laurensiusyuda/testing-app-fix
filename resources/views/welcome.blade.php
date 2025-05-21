<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logistik Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-b from-slate-100 to-slate-200 text-gray-800 min-h-screen flex items-center justify-center">
    <div class="text-center px-6 py-10 bg-white shadow-xl rounded-xl w-full max-w-lg">
        <h1 class="text-3xl font-bold text-blue-700 mb-4">Selamat Datang Admin</h1>
        <p class="text-gray-600 mb-6">Silakan login untuk mengakses dashboard logistik.</p>

        <a href="{{ route('login') }}"
           class="inline-block px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
            Login
        </a>
    </div>
</body>
</html>
