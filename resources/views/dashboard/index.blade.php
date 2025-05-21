<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Admin
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded shadow text-center">
                    <h3 class="text-lg font-bold text-gray-700">Jumlah Barang</h3>
                    <p class="text-2xl mt-2 text-blue-600">{{ $jumlahBarang }}</p>
                </div>
                <div class="bg-white p-6 rounded shadow text-center">
                    <h3 class="text-lg font-bold text-gray-700">Total Penjualan</h3>
                    <p class="text-2xl mt-2 text-green-600">Rp {{ number_format($totalPenjualan, 0, ',', '.') }}</p>
                </div>
                <div class="bg-white p-6 rounded shadow text-center">
                    <h3 class="text-lg font-bold text-gray-700">Jumlah Transaksi</h3>
                    <p class="text-2xl mt-2 text-orange-500">{{ $jumlahPenjualan }}</p>
                </div>
            </div>

            <div class="mt-10 flex flex-col md:flex-row gap-4 justify-center">
                <a href="{{ route('barang.index') }}"
                   class="bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-600 text-center">
                    Kelola Barang
                </a>
                <a href="{{ route('penjualan.index') }}"
                   class="bg-green-500 text-white px-6 py-3 rounded hover:bg-green-600 text-center">
                    Riwayat Penjualan
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
