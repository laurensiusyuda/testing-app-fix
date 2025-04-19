<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        $deletedBarang = Barang::onlyTrashed()->latest()->first();
        return view('barang', compact('barangs', 'deletedBarang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|integer',
            'kuantitas' => 'required|integer',
        ]);

        Barang::create($request->only(['nama', 'harga', 'kuantitas']));
        return redirect('/');
    }

    public function destroy($id)
    {
        Barang::findOrFail($id)->delete();
        return redirect('/');
    }

    public function undo($id)
    {
        Barang::withTrashed()->findOrFail($id)->restore();
        return redirect('/');
    }
}
