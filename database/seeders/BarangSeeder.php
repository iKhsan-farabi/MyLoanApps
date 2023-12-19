<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Tambahkan data barang
         DB::table('barang')->insert([
            'nama_barang' => 'Laptop Acer Aspire 5',
            'brand' => 'Acer',
            'jumlah' => 10,
            'tanggal_beli' => '2023-01-01',
            'harga_beli' => 800,
            'kondisi' => 'Baik',
            'created_at' => now(),
            'updated_at' => now(),
            'kode_barang' => 'BRG-1234',
            'pemasok_id' => 1, // Ganti dengan ID pemasok yang sesuai
            'kategori_id' => 1, // Ganti dengan ID kategori yang sesuai
        ]);

        DB::table('barang')->insert([
            'nama_barang' => 'Smartphone Samsung Galaxy S21',
            'brand' => 'Samsung',
            'jumlah' => 15,
            'tanggal_beli' => '2023-01-15',
            'harga_beli' => 1000,
            'kondisi' => 'Baru',
            'created_at' => now(),
            'updated_at' => now(),
            'kode_barang' => 'BRG-1235',
            'pemasok_id' => 1, // Ganti dengan ID pemasok yang sesuai
            'kategori_id' => 1, // Ganti dengan ID kategori yang sesuai
        ]);

        DB::table('barang')->insert([
            'nama_barang' => 'Monitor Dell Ultrasharp',
            'brand' => 'Dell',
            'jumlah' => 20,
            'tanggal_beli' => '2023-02-01',
            'harga_beli' => 300,
            'kondisi' => 'Baik',
            'created_at' => now(),
            'updated_at' => now(),
            'kode_barang' => 'BRG-1235',
            'pemasok_id' => 1, // Ganti dengan ID pemasok yang sesuai
            'kategori_id' => 1, // Ganti dengan ID kategori yang sesuai
        ]);

        DB::table('barang')->insert([
            'nama_barang' => 'Keyboard Mechanical Razer',
            'brand' => 'Razer',
            'jumlah' => 50,
            'tanggal_beli' => '2023-02-15',
            'harga_beli' => 150,
            'kondisi' => 'Baru',
            'created_at' => now(),
            'updated_at' => now(),
            'kode_barang' => 'BRG-1236',
            'pemasok_id' => 1, // Ganti dengan ID pemasok yang sesuai
            'kategori_id' => 1, // Ganti dengan ID kategori yang sesuai
        ]);

        DB::table('barang')->insert([
            'nama_barang' => 'Printer HP LaserJet Pro',
            'brand' => 'HP',
            'jumlah' => 8,
            'tanggal_beli' => '2023-03-01',
            'harga_beli' => 400,
            'kondisi' => 'Baik',
            'created_at' => now(),
            'updated_at' => now(),
            'kode_barang' => 'BRG-1237',
            'pemasok_id' => 1, // Ganti dengan ID pemasok yang sesuai
            'kategori_id' => 1, // Ganti dengan ID kategori yang sesuai
        ]);

        DB::table('barang')->insert([
            'nama_barang' => 'Mouse Logitech G Pro',
            'brand' => 'Logitech',
            'jumlah' => 30,
            'tanggal_beli' => '2023-03-15',
            'harga_beli' => 80,
            'kondisi' => 'Baru',
            'created_at' => now(),
            'updated_at' => now(),
            'kode_barang' => 'BRG-1238',
            'pemasok_id' => 1, // Ganti dengan ID pemasok yang sesuai
            'kategori_id' => 1, // Ganti dengan ID kategori yang sesuai
        ]);

        DB::table('barang')->insert([
            'nama_barang' => 'Headset SteelSeries Arctis 7',
            'brand' => 'SteelSeries',
            'jumlah' => 12,
            'tanggal_beli' => '2023-04-01',
            'harga_beli' => 200,
            'kondisi' => 'Baik',
            'created_at' => now(),
            'updated_at' => now(),
            'kode_barang' => 'BRG-1239',
            'pemasok_id' => 1, // Ganti dengan ID pemasok yang sesuai
            'kategori_id' => 1, // Ganti dengan ID kategori yang sesuai
        ]);
    }
}
