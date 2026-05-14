<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat Akun Admin Tera Tani
        User::create([
            'name' => 'Administrator Tera Tani',
            'email' => 'admin@teratani.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'status' => 'approved',
            'is_active' => true,
        ]);

        // Contoh Petani 1 (Jakarta) untuk Peta
        User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'password' => Hash::make('password123'),
            'role' => 'petani',
            'status' => 'approved',
            'is_active' => true,
            'region' => 'Jakarta Pusat',
            'latitude' => -6.20000000,
            'longitude' => 106.81666600,
        ]);

        // Contoh Petani 2 (Surabaya) untuk Peta
        User::create([
            'name' => 'Siti Aminah',
            'email' => 'siti@example.com',
            'password' => Hash::make('password123'),
            'role' => 'petani',
            'status' => 'pending', // Muncul di antrean manajemen akun
            'is_active' => false,
            'region' => 'Surabaya',
            'latitude' => -7.25044500,
            'longitude' => 112.76884500,
        ]);
    }
}