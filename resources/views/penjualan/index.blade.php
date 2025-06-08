<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Daftar Penjualan</h2>
    </x-slot>

    <div class="p-4">
        <form method="GET" class="mb-4">
            <select name="filter" onchange="this.form.submit()">
                <option value="all" {{ request('filter') == 'all' ? 'selected' : '' }}>Semua</option>
                <option value="daily" {{ request('filter') == 'daily' ? 'selected' : '' }}>Harian</option>
                <option value="weekly" {{ request('filter') == 'weekly' ? 'selected' : '' }}>Mingguan</option>
                <option value="monthly" {{ request('filter') == 'monthly' ? 'selected' : '' }}>Bulanan</option>
                <option value="yearly" {{ request('filter') == 'yearly' ? 'selected' : '' }}>Tahunan</option>
            </select>
        </form>

        <form method="POST" action="/penjualan" class="mb-6">
            @csrf
            <select name="barang_id" required>
                <option value="">Pilih Barang</option>
                @foreach($barangs as $barang)
                    <option value="{{ $barang->id }}">{{ $barang->nama }} (Stok: {{ $barang->kuantitas }})</option>
                @endforeach
            </select>
            <input type="number" name="jumlah" placeholder="Jumlah" required>
            <button type="submit">Jual</button>
        </form>

        <table border="1" cellpadding="5">
            <thead>
                <tr>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse($penjualans as $p)
                    <tr>
                        <td>{{ $p->barang->nama }}</td>
                        <td>{{ $p->jumlah }}</td>
                        <td>Rp {{ number_format($p->total_harga) }}</td>
                        <td>{{ \Carbon\Carbon::parse($p->tanggal)->format('Y-m-d') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Tidak ada data penjualan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
