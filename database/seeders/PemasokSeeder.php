<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PemasokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tambahkan data pemasok
        DB::table('pemasok')->insert([
            'kode_pemasok' => 'P001',
            'nama_pemasok' => 'Supplier A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('pemasok')->insert([
            'kode_pemasok' => 'P002',
            'nama_pemasok' => 'Supplier B',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('pemasok')->insert([
            'kode_pemasok' => 'P003',
            'nama_pemasok' => 'Supplier C',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('pemasok')->insert([
            'kode_pemasok' => 'P004',
            'nama_pemasok' => 'Supplier D',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('pemasok')->insert([
            'kode_pemasok' => 'P005',
            'nama_pemasok' => 'Supplier E',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('pemasok')->insert([
            'kode_pemasok' => 'P006',
            'nama_pemasok' => 'Supplier F',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('pemasok')->insert([
            'kode_pemasok' => 'P007',
            'nama_pemasok' => 'Supplier G',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
