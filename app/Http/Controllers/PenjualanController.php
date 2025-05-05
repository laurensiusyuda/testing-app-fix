<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        return view('penjualan.index', [
            'penjualans' => Penjualan::with('barang')->latest()->get(),
            'barangs' => Barang::all(),
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

        $barang->kuantitas -= $request->jumlah;
        $barang->save();

        Penjualan::create([
            'barang_id' => $barang->id,
            'jumlah' => $request->jumlah,
            'total_harga' => $barang->harga * $request->jumlah,
        ]);

        return redirect('/penjualan')->with('success', 'Penjualan berhasil!');
    }
}
