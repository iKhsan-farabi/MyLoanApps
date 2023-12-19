<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\AddIn;
use App\Models\AddOut;
use App\Models\KategoriBarang;
use App\Models\Pemasok;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $name = $user->name;
        $barang = Barang::all();
        $pemasok = Pemasok::all();
        $kategori_barang = KategoriBarang::all();

        return view('barang.view', compact('barang', 'name','kategori_barang','pemasok'));
    }

    public function edit($id)
    {
        $kategori_barang = KategoriBarang::all();
        $barang = Barang::findOrFail($id);
        $pemasok = Pemasok::all();
        return view('barang.edit', compact('barang','kategori_barang','pemasok'));
    }

    public function create()
    {
        $kategori_barang = KategoriBarang::all();
        $pemasok = Pemasok::all();
        return view('barang.create', compact('kategori_barang','pemasok'));
        
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'brand' => 'required',
            'kategori_id' => 'required',
            'jumlah' => 'required|numeric',
            'tanggal_beli' => 'required|date',
            'harga_beli' => 'required|numeric',
            'pemasok_id' =>'required',
            'kondisi' => 'required',
            
        ]);


        $barang = Barang::findOrFail($id);
        $barang->update($request->all());

        return redirect()->route('view_barang')->with('success', 'Data barang berhasil diperbarui.');
    }

    public function delete($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('view_barang')->with('success', 'Data barang berhasil dihapus.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'brand' => 'required|string',
            'jumlah' => 'required|integer|min:0',
            'tanggal_beli' => 'required|date',
            'harga_beli' => 'required|numeric|min:0',
            'kondisi' => 'required|string|max:255',
            'pemasok_id' => 'required',
            'kode_barang' => 'required',
        ]);

        // Tambahkan barang baru
        $barang = Barang::create([
            'nama_barang' => $request->input('nama_barang'),
            'brand' => $request->input('brand'),
            'jumlah' => $request->input('jumlah'),
            'tanggal_beli' => $request->input('tanggal_beli'),
            'harga_beli' => $request->input('harga_beli'),
            'kondisi' => $request->input('kondisi'),
            'kode_barang' => $request->input('kode_barang'),
            'kategori_id' => $request->input('kategori_id'),
            'pemasok_id' => $request->input('pemasok_id'),
        ]);

        // Catat transaksi barang masuk
        AddIn::create([
            'barang_id' => $barang->id,
            'jumlah' => $barang->jumlah,
            'qr_code' => null,
        ]);

        return redirect()->route('view_barang')->with('success', 'Data barang berhasil ditambahkan.');
    }

    public function stok($id)
    {
        $barang = Barang::findOrFail($id);
        $stok = $barang->hitungStok();

        return view('barang.stok', compact('barang', 'stok'));
    }
}




// use App\Models\Barang;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class BarangController extends Controller
// {
//     //

//     public function index(){
//         $user = Auth::user();
//         $name = $user->name;
//         $barang = Barang::all();
        
//         return view('barang.view', compact('barang','name'));
//     }
//     public function edit($id){
//         $barang = Barang::findOrFail($id);
//         return view('barang.edit', compact('barang'));
//     }
//     public function create(){
//         return view('barang.create');
//     }
//     public function update(Request $request, $id){
       
//         $request->validate([
//             'kode_barang' => 'required',
//             'nama_barang' => 'required',
//             'brand' => 'required',
//             'jumlah' => 'required|numeric',
//             'tanggal_beli' => 'required|date',
//             'harga_beli' => 'required|numeric',
//             'kondisi' => 'required',
//         ]);
        
//         $barang = Barang::findOrFail($id);
//         $barang->update($request->all());

//         return redirect()->route('view_barang')->with('success', 'Data barang berhasil diperbarui.');
//     }
//     public function delete($id){
//         $barang = Barang::findOrFail($id);
//         $barang->delete();

//         return redirect()->route('view_barang')->with('success', 'Data barang berhasil dihapus.');
//     }
//     public function store(Request $request)
//     {
//         $request->validate([
//             'nama_barang' => 'required|string|max:255',
//             'brand' => 'required|string',
//             'jumlah' => 'required|integer|min:0',
//             'tanggal_beli' => 'required|date',
//             'harga_beli' => 'required|numeric|min:0',
//             'kondisi' => 'required|string|max:255',
//             'kode_barang' => 'required',
            
//         ]);

//         Barang::create([
//             'nama_barang' => $request->input('nama_barang'),
//             'brand' => $request->input('brand'),
//             'jumlah' => $request->input('jumlah'),
//             'tanggal_beli' => $request->input('tanggal_beli'),
//             'harga_beli' => $request->input('harga_beli'),
//             'kondisi' => $request->input('kondisi'),
//             'kode_barang' => $request->input('kode_barang'),
            
//         ]);

//         return redirect()->route('view_barang')->with('success', 'Data barang berhasil ditambahkan.');
//     }
// }
