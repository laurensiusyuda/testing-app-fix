@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-semibold mb-4">Daftar Penjualan</h2>

    <!-- Filter Penjualan -->
    <form method="GET" class="mb-4">
        <select name="filter" onchange="this.form.submit()">
            <option value="all" {{ request('filter') == 'all' ? 'selected' : '' }}>Semua</option>
            <option value="daily" {{ request('filter') == 'daily' ? 'selected' : '' }}>Harian</option>
            <option value="weekly" {{ request('filter') == 'weekly' ? 'selected' : '' }}>Mingguan</option>
            <option value="monthly" {{ request('filter') == 'monthly' ? 'selected' : '' }}>Bulanan</option>
            <option value="yearly" {{ request('filter') == 'yearly' ? 'selected' : '' }}>Tahunan</option>
        </select>
    </form>

    <!-- Form Input Penjualan -->
    <form method="POST" action="/penjualan" class="mb-6">
        @csrf
        <select name="barang_id" required>
            <option value="">Pilih Barang</option>
            @foreach($barangs as $barang)
                <option value="{{ $barang->id }}">{{ $barang->nama }} (Stok: {{ $barang->kuantitas }})</option>
            @endforeach
        </select>
        <input type="number" name="jumlah" placeholder="Jumlah" required>
        <input type="number" name="harga_jual" placeholder="Harga Jual (Opsional)">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Jual</button>
    </form>

    <!-- Tabel Penjualan -->
    <table class="w-full border-collapse border" cellpadding="5">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">Barang</th>
                <th class="border p-2">Jumlah</th>
                <th class="border p-2">Total Harga</th>
                <th class="border p-2">Tanggal</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($penjualans as $p)
                <tr>
                    <td class="border p-2">{{ $p->barang->nama }}</td>
                    <td class="border p-2">{{ $p->jumlah }}</td>
                    <td class="border p-2">Rp {{ number_format($p->total_harga) }}</td>
                    <td class="border p-2">{{ \Carbon\Carbon::parse($p->tanggal)->format('Y-m-d') }}</td>
                    <td class="border p-2">
                        <form method="POST" action="{{ route('penjualan.destroy', $p->id) }}" onsubmit="return confirm('Yakin ingin membatalkan penjualan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Undo</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center p-2">Belum ada penjualan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
