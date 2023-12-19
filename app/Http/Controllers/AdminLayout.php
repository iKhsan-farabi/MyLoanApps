<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLayout extends Controller
{
    //
    public function index(){

    // Jika login berhasil
    $user = Auth::user(); // Mengambil data pengguna yang sudah login
    $name = $user->name;



    }
}
