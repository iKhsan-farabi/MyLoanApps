<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TruncateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         // Nonaktifkan foreign key checks
         DB::statement('SET FOREIGN_KEY_CHECKS=0');

         // Truncate tabel yang memiliki foreign key ke tabel lain
         DB::table('barang')->truncate(); // Misalnya, tabel 'barang' memiliki foreign key ke 'pemasok' dan 'kategori'
 
         // Truncate tabel yang berelasi dengan tabel lain
         DB::table('pemasok')->truncate();
         DB::table('kategori_barang')->truncate();
         // Truncate tabel yang memiliki foreign key ke tabel lain
         DB::table('users')->truncate(); // Tabel 'users' mungkin memiliki foreign key ke 'roles'

         // Truncate tabel yang berelasi dengan tabel lain
         DB::table('roles')->truncate();
         DB::table('add_barangin')->truncate();
         DB::table('add_barangout')->truncate();

 
         // Aktifkan kembali foreign key checks
         DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
