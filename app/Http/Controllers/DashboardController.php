<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Penjualan;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $tanggal = $request->input('tanggal');
        $tanggalBarang = $request->input('tanggal_barang');

        $penjualans = Penjualan::with('barang')
            ->when($tanggal, fn($query) => $query->whereDate('tanggal', $tanggal))
            ->latest()->get();

        $barangs = Barang::when($tanggalBarang, fn($query) => $query->whereDate('created_at', $tanggalBarang))
            ->latest()->get();

        return view('dashboard.index', compact('penjualans', 'barangs', 'tanggal', 'tanggalBarang'));
    }
}
