<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    //
    public function index()
    {
        // Menampilkan daftar semua pengguna
        $roles = Role::all();
        $user = User::all();
        return view('users.index', compact('user','roles'));
    }

    public function show($id)
    {
        // Menampilkan detail satu pengguna
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function create()
    {
        // Menampilkan formulir pembuatan pengguna baru
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role_id = $request->input('role_id');
        $user->save();

        return redirect()->route('users.index')->with('success', 'Data Berhasil Ditambahkan');
   
    }
    public function edit($id){
        
        $user = User::findOrFail($id);
        $roles = Role::all();
        
    
        return view('users.edit', compact('user','roles'));
    }
    public function update(Request $request, $id){
        $auth = auth()->user()->id;
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6',
            'role_id' => 'nullable|exists:roles,id',
        ]);
        // dd('ok');
    
        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

    
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
    
        $user->role_id = $request->input('role_id');
        $user->save();


        if($auth == $id){
            if(auth()->user()->role_id == 2){
                return redirect()->route('home')->with('success', 'Akun anda berhasil diupdate');
            }elseif(auth()->user()->role_id == 1){
                return redirect()->route('users.index')->with('success', 'Akun anda berhasil diupdate');
            }else{
                return redirect()->route('view_barang')->with('success', 'Akun anda berhasil diupdate');
            }
        }else{
            return redirect()->route('users.index')->with('success', 'Data pengguna berhasil diperbarui.');
        }
    }
    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Data pengguna berhasil dihapus.');

    }
}
