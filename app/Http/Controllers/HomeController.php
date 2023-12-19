<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Barang;
use App\Models\AddIn;
use App\Models\AddOut;
use App\Models\User;
use App\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /** 
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Join Transaksi
        $addIn = AddIn::select('id', 'barang_id', 'jumlah', 'updated_at')->get();
        $addOut = AddOut::select('id', 'barang_id', 'jumlah', 'updated_at')->get();
        $countIn = $addIn->count();
        $countOut = $addOut->count();
        $transaksi = $addIn->concat($addOut)->sortByDesc('updated_at');
         // Jika login berhasil
        $auth = Auth::user(); // Mengambil data pengguna yang sudah login
        $name = $auth->name;
        $barang = Barang::all();
        $user = User::all();
        $roles = Role::all();
        $totalBarang = Barang::count();
        $totalKondisiBaru = Barang::where('kondisi' , 'Baru')->count();
        $totalKondisiBaik = Barang::where('kondisi', 'Baik')->count();
        $stokBarang = Barang::sum('jumlah');
        $totalAset = Barang::sum('harga_beli');

        if($auth->role_id == 1){
            return view('users.index', compact('name','user','roles'));
        }elseif($auth->role_id == 3){
            return view('barang.view', compact('name','barang'));
        }else{
            return view('home', compact('name','totalAset','stokBarang','totalBarang','totalKondisiBaru','totalKondisiBaik','transaksi','countIn','countOut'));
        }
        }
}
