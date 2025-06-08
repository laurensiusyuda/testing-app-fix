@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Dashboard</h1>

    <form method="GET" class="mb-6">
        <label>Tanggal Penjualan:</label>
        <input type="date" name="tanggal" value="{{ $tanggal }}" class="border p-1">
        <label class="ml-4">Tanggal Barang:</label>
        <input type="date" name="tanggal_barang" value="{{ $tanggalBarang }}" class="border p-1">
        <button type="submit" class="ml-2 px-4 py-1 bg-blue-500 text-white rounded">Filter</button>
    </form>

    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-2">Data Penjualan</h2>
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 border">No</th>
                    <th class="p-2 border">Barang</th>
                    <th class="p-2 border">Jumlah</th>
                    <th class="p-2 border">Total Harga</th>
                    <th class="p-2 border">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($penjualans as $i => $p)
                <tr>
                    <td class="p-2 border">{{ $i + 1 }}</td>
                    <td class="p-2 border">{{ $p->barang->nama ?? '-' }}</td>
                    <td class="p-2 border">{{ $p->jumlah }}</td>
                    <td class="p-2 border">Rp {{ number_format($p->total_harga, 0, ',', '.') }}</td>
                    <td class="p-2 border">{{ $p->tanggal->format('Y-m-d') }}</td>
                </tr>
                @empty
                <tr><td colspan="5" class="p-2 text-center">Tidak ada data penjualan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>
        <h2 class="text-xl font-semibold mb-2">Data Barang</h2>
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 border">No</th>
                    <th class="p-2 border">Nama</th>
                    <th class="p-2 border">Harga</th>
                    <th class="p-2 border">Stok</th>
                    <th class="p-2 border">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($barangs as $i => $b)
                <tr>
                    <td class="p-2 border">{{ $i + 1 }}</td>
                    <td class="p-2 border">{{ $b->nama }}</td>
                    <td class="p-2 border">Rp {{ number_format($b->harga, 0, ',', '.') }}</td>
                    <td class="p-2 border">{{ $b->kuantitas }}</td>
                    <td class="p-2 border">{{ $b->created_at->format('Y-m-d') }}</td>
                </tr>
                @empty
                <tr><td colspan="5" class="p-2 text-center">Tidak ada data barang.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
