<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">Ringkasan</h3>
                <ul class="space-y-2">
                    <li>Total Barang: <strong>{{ $totalBarang }}</strong></li>
                    <li>Total Penjualan: <strong>{{ $totalPenjualan }}</strong></li>
                    <li>Total Pendapatan: <strong>Rp{{ number_format($totalPendapatan) }}</strong></li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
