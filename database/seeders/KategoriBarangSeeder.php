<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Tambahkan data kategori
        DB::table('kategori_barang')->insert([
            'nama_kategori' => 'Elektronik',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kategori_barang')->insert([
            'nama_kategori' => 'Furnitur',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kategori_barang')->insert([
            'nama_kategori' => 'Alat Tulis',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kategori_barang')->insert([
            'nama_kategori' => 'Otomotif',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kategori_barang')->insert([
            'nama_kategori' => 'Olahraga',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
