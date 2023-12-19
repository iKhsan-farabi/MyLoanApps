<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemasok;
use App\Models\Role;

class PemasokController extends Controller
{
    //
    public function index(){

        $user = Auth::user();
        $name = $user->name;
        $pemasok = Pemasok::all();
        return view('pemasok.view', compact('pemasok','name'));
    }
    public function show($id){
        $pemasok = Pemasok::findOrFail($id);
        return view('pemasok.show', compact('pemasok'));
    }
    public function create(){
        // Menampilkan formulir pembuatan pemasok
        $roles = Role::all();
        return view('pemasok.create', compact('roles'));
    }
    public function store(Request $request){
        $request->validate([
            'kode_pemasok' => 'required|string|max:255',
            'nama_pemasok' => 'required|string|max:255',
        ]);
        Pemasok::create([
            'kode_pemasok'=>$request->input('kode_pemasok'),
            'nama_pemasok'=>$request->input('nama_pemasok'),
        ]);
        return redirect()->route('pemasok.index')->with('success', 'Data Pemasok berhasil ditambahkan');
    }

    public function update(Request $request, $id){
        $request->validate([
            'kode_pemasok' => 'required|string|max:255',
            'nama_pemasok' => 'required|string|max:255',
        ]);
        $pemasok = Pemasok::findOrFail($id);
        $pemasok->update($request->all());

        return redirect()->route('pemasok.index')->with('success', 'Data pemasok berhasil diperbarui.');
    }
    public function destroy($id){
        $pemasok = Pemasok::findOrFail($id);
        $pemasok->delete();

        return redirect()->route('pemasok.index')->with('success', 'Data pemasok berhasil dihapus.');
    }
    public function edit($id){
        
        $pemasok = Pemasok::findOrFail($id);
        return view('pemasok.edit', compact('pemasok'));
    }
}
