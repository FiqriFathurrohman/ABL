<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat Akun Admin TANIHUB
        User::updateOrCreate(
            ['email' => 'tanijaya@tanihub.com'], // Cek jika email sudah ada
            [
                'name' => 'Admin Tanijaya',
                'password' => Hash::make('tanihub098'),
                'email_verified_at' => now(),
            ]
        );
    }
}