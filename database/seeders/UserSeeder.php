<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'), 
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Dokter',
            'email' => 'dokter@dokter.com',
            'password' => bcrypt('dokter123'), 
            'role' => 'dokter',
        ]);
    }
}
