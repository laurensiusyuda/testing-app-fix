<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Penjualan;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalBarang' => Barang::count(),
            'totalPenjualan' => Penjualan::count(),
            'totalPendapatan' => Penjualan::sum('total_harga'),
        ]);
    }
}
