<?php

namespace Database\Seeders;

use App\User; // Pastikan ini mengarah ke model User yang benar
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Kode untuk membuat akun admin
        User::create([
            'nama' => 'admin',
            'username' => 'admin123',
            'password' => Hash::make('admin123'),
            'role' => 2,
            'foto' => 'default.jpg',
        ]);
    }
}