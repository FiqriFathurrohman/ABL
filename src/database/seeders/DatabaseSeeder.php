<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Role 'admin'
        $role = Role::firstOrCreate(['name' => 'admin']);

        // 2. Buat User Admin sesuai dengan image_86d922.jpg
        $user = User::create([
            'name' => 'Admin Tera Tani',
            'email' => 'admin@teratani.com',
            'password' => bcrypt('p455w0rd1!.'), // Gunakan password ini saat login
            'status' => 'approved',
            'is_active' => true,
        ]);

        // 3. Assign Role
        $user->assignRole($role);
    }
}