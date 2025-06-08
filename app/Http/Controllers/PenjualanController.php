<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PenjualanController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter', 'all');

        $query = Penjualan::with('barang');

        if ($filter === 'daily') {
            $query->whereDate('tanggal', Carbon::today());
        } elseif ($filter === 'weekly') {
            $query->whereBetween('tanggal', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        } elseif ($filter === 'monthly') {
            $query->whereMonth('tanggal', now()->month);
        } elseif ($filter === 'yearly') {
            $query->whereYear('tanggal', now()->year);
        }

        return view('penjualan.index', [
            'penjualans' => $query->latest()->get(),
            'barangs' => Barang::all(),
            'filter' => $filter,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $barang = Barang::findOrFail($request->barang_id);

        if ($barang->kuantitas < $request->jumlah) {
            return back()->withErrors(['jumlah' => 'Stok tidak mencukupi']);
        }

        $barang->decrement('kuantitas', $request->jumlah);

        Penjualan::create([
            'barang_id' => $barang->id,
            'jumlah' => $request->jumlah,
            'total_harga' => $barang->harga * $request->jumlah,
            'tanggal' => now(),
        ]);

        return redirect('/penjualan')->with('success', 'Penjualan berhasil dicatat.');
    }
}
