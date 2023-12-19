<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriBarang;

class KategoriBarangController extends Controller
{
    public function index()
    {
        $kategori_barang = KategoriBarang::all();
        return view('kategori-barang.view', compact('kategori_barang'));
    }

    public function create()
    {
        return view('kategori-barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:kategori_barang,nama_kategori',
        ]);

        KategoriBarang::create($request->all());

        return redirect()->route('kategori-barang.index')
            ->with('success', 'Kategori barang berhasil ditambahkan.');
    }

    public function show(KategoriBarang $kategori_barang)
    {
        return view('kategori-barang.show', compact('kategori_barang'));
    }

    public function edit(KategoriBarang $kategori_barang)
    {
        return view('kategori-barang.edit', compact('kategori_barang'));
    }

    public function update(Request $request, KategoriBarang $kategori_barang)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:kategori_barang,nama_kategori,'.$kategori_barang->id,
        ]);

        $kategori_barang->update($request->all());

        return redirect()->route('kategori-barang.index')
            ->with('success', 'Kategori barang berhasil diperbarui.');
    }

    public function destroy(KategoriBarang $kategori_barang)
    {
        $kategori_barang->delete();

        return redirect()->route('kategori-barang.index')
            ->with('success', 'Kategori barang berhasil dihapus.');
    }
}
