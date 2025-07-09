<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User biasa
        User::create([
            'name' => 'Tes',
            'email' => 'tes@gmail.com',
            'phone_number' => '081234567890',
            'password' => Hash::make('11111111'), // 8 digit 1
            'balance' => 100000,
            'role' => 'user',
        ]);

        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone_number' => '089876543210',
            'password' => Hash::make('secret123'),
            'balance' => 50000,
            'role' => 'user',
        ]);

        // Mitra
        User::create([
            'name' => 'pengepul sampah',
            'email' => 'mitra@example.com',
            'phone_number' => '081122334455',
            'password' => Hash::make('mitra123'),
            'balance' => 0,
            'role' => 'mitra',
        ]);
    }
}
