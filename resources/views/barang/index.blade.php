@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-4">Daftar Barang</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4 flex justify-between items-center">
            <span>{{ session('success') }}</span>
            @if($deletedBarang)
                <form method="POST" action="{{ route('barang.undo') }}">
                    @csrf
                    <button class="text-sm text-blue-600 hover:underline" type="submit">Undo</button>
                </form>
            @endif
        </div>
    @endif

    <form method="POST" action="/barang" class="mb-6 space-y-4">
        @csrf
        <input type="text" name="nama" placeholder="Nama" required class="w-full border p-2 rounded" />
        <input type="number" name="harga" placeholder="Harga" required class="w-full border p-2 rounded" />
        <input type="number" name="kuantitas" placeholder="Kuantitas" required class="w-full border p-2 rounded" />
        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah Barang</button>
    </form>

    <table class="w-full table-auto border-collapse">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">#</th>
                <th class="border p-2">Nama</th>
                <th class="border p-2">Harga</th>
                <th class="border p-2">Kuantitas</th>
                <th class="border p-2">Tanggal</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangs as $i => $barang)
            <tr>
                <td class="border p-2">{{ $i + 1 }}</td>
                <td class="border p-2">{{ $barang->nama }}</td>
                <td class="border p-2">{{ $barang->harga }}</td>
                <td class="border p-2">{{ $barang->kuantitas }}</td>
                <td class="border p-2">{{ $barang->created_at->format('d M Y') }}</td>
                <td class="border p-2">
                    <form method="POST" action="/barang/{{ $barang->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500 hover:underline" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-8">
        <h2 class="font-semibold text-lg mb-2">Laporan Barang Masuk:</h2>
        <ul class="space-y-1">
            <li>Hari ini: <strong>{{ $dailyCount }}</strong></li>
            <li>Minggu ini: <strong>{{ $weeklyCount }}</strong></li>
            <li>Bulan ini: <strong>{{ $monthlyCount }}</strong></li>
            <li>Tahun ini: <strong>{{ $yearlyCount }}</strong></li>
        </ul>
    </div>
</div>
@endsection
