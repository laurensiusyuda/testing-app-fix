<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Penjualan') }}
        </h2>
    </x-slot>

    <div class="py-6 px-6 space-y-6">

        <!-- Form Tambah Penjualan -->
        <div class="bg-white shadow-md rounded p-6">
            <h3 class="text-lg font-bold mb-4">Tambah Penjualan</h3>
            @if ($errors->any())
                <div class="text-red-600 mb-3">
                    <ul>
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="text-green-600 mb-3">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('penjualan.index') }}" class="space-y-4">
                @csrf
                <div>
                    <label for="barang_id" class="block font-medium">Pilih Barang</label>
                    <select name="barang_id" class="w-full border rounded px-3 py-2">
                        @foreach ($barangs as $barang)
                            <option value="{{ $barang->id }}">
                                {{ $barang->nama }} (Stok: {{ $barang->kuantitas }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="jumlah" class="block font-medium">Jumlah</label>
                    <input type="number" name="jumlah" class="w-full border rounded px-3 py-2" min="1" required>
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Simpan Penjualan
                </button>
            </form>
        </div>

        <!-- Riwayat Penjualan -->
        <div class="bg-white shadow-md rounded p-6">
            <h3 class="text-lg font-bold mb-4">Riwayat Penjualan</h3>
            @if ($penjualans->count() > 0)
                <table class="table-auto w-full text-left border">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 border">Barang</th>
                            <th class="px-4 py-2 border">Jumlah</th>
                            <th class="px-4 py-2 border">Total Harga</th>
                            <th class="px-4 py-2 border">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penjualans as $pj)
                            <tr>
                                <td class="px-4 py-2 border">{{ $pj->barang->nama }}</td>
                                <td class="px-4 py-2 border">{{ $pj->jumlah }}</td>
                                <td class="px-4 py-2 border">Rp {{ number_format($pj->total_harga, 0, ',', '.') }}</td>
                                <td class="px-4 py-2 border">{{ $pj->created_at->format('d M Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-gray-600">Belum ada data penjualan.</p>
            @endif
        </div>
    </div>
</x-app-layout>
