<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penjualan;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahBarang = Barang::count();
        $totalPenjualan = Penjualan::sum('total_harga');
        $jumlahPenjualan = Penjualan::count();

        return view('dashboard.index', compact('jumlahBarang', 'totalPenjualan', 'jumlahPenjualan'));
    }
}
