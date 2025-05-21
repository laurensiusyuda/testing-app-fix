<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $barangs = Barang::latest()->get();
        $deletedBarang = Barang::onlyTrashed()->latest()->first();

        // Filter berdasarkan waktu
        $dailyCount = Barang::whereDate('created_at', Carbon::today())->count();
        $weeklyCount = Barang::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $monthlyCount = Barang::whereMonth('created_at', Carbon::now()->month)->count();
        $yearlyCount = Barang::whereYear('created_at', Carbon::now()->year)->count();

        return view('barang.index', compact('barangs', 'deletedBarang', 'dailyCount', 'weeklyCount', 'monthlyCount', 'yearlyCount'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|integer',
            'kuantitas' => 'required|integer',
        ]);

        Barang::create($request->only('nama', 'harga', 'kuantitas'));

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    }

    public function undo()
    {
        $barang = Barang::onlyTrashed()->latest()->first();

        if ($barang) {
            $barang->restore();
            return redirect()->route('barang.index')->with('success', 'Barang berhasil dipulihkan!');
        }

        return redirect()->route('barang.index')->with('error', 'Tidak ada barang untuk di-undo.');
    }
}
