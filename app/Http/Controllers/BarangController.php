<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        // Ambil semua data barang
        $barangs = Barang::all();

        // Kirim data barang ke view
        return view('welcome', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|integer',
            'kuantitas' => 'required|integer',
        ]);

        // Menambahkan barang baru
        Barang::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'kuantitas' => $request->kuantitas,
        ]);

        return redirect('/')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        // Menghapus barang berdasarkan ID
        Barang::findOrFail($id)->delete();

        return redirect('/')->with('success', 'Barang berhasil dihapus!');
    }
    public function undo(Request $request)
{
    // Cek apakah ada barang yang dihapus
    $barang = Barang::withTrashed()->find($request->id);
    
    // Jika barang ditemukan, restore barang
    if ($barang) {
        $barang->restore();
        return redirect('/barang')->with('success', 'Barang berhasil dikembalikan!');
    }

    return redirect('/barang')->with('error', 'Barang tidak ditemukan!');
}

}
