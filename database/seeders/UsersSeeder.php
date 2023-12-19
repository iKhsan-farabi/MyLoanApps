<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
               // Tambahkan data pengguna
               DB::table('users')->insert([
                'name' => 'Livia',
                'email' => 'livia@asia.com',
                'email_verified_at' => now(),
                'password' => Hash::make('bismillah0'),
                'remember_token' => \Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => 1, // Ganti dengan ID role yang sesuai
            ]);
    
            DB::table('users')->insert([
                'name' => 'Aina',
                'email' => 'aina@asia.com',
                'email_verified_at' => now(),
                'password' => Hash::make('bismillah0'),
                'remember_token' => \Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => 2, // Ganti dengan ID role yang sesuai
            ]);
    
            DB::table('users')->insert([
                'name' => 'Dinda',
                'email' => 'dinda@asia.com',
                'email_verified_at' => now(),
                'password' => Hash::make('bismillah0'),
                'remember_token' => \Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => 3, // Ganti dengan ID role yang sesuai
            ]);
    
    
    }
}
