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
        ->latest()
        ->paginate(5, ['*'], 'penjualan_page')
        ->withQueryString();

    $laporan = $penjualans->map(function ($p) {
        $hargaBeli = $p->barang->harga ?? 0;
        $hargaJual = $p->harga_jual ?? ($p->jumlah ? $p->total_harga / $p->jumlah : 0);
        $laba = ($hargaJual - $hargaBeli) * $p->jumlah;

        return [
            'tanggal' => optional($p->tanggal)->format('Y-m-d'),
            'nama_barang' => $p->barang->nama ?? '-',
            'harga_beli' => $hargaBeli,
            'harga_jual' => $hargaJual,
            'laba' => $laba,
        ];
    });

   
    $barangs = Barang::when($tanggalBarang, fn($query) => $query->whereDate('created_at', $tanggalBarang))
        ->latest()
        ->paginate(5, ['*'], 'barang_page')
        ->withQueryString();

    return view('dashboard.index', compact('penjualans', 'barangs', 'tanggal', 'tanggalBarang', 'laporan'));
    }
}
