<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Tes',
            'email' => 'tes@gmail.com',
            'phone_number' => '081234567890',
            'password' => Hash::make('11111111'), // 111 nya 8 kali
            'balance' => 100000, // Saldo Rp100.000
        ]);

        // Tambahkan user lain jika diperlukan
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone_number' => '089876543210',
            'password' => Hash::make('secret123'),
            'balance' => 50000,
        ]);
    }
    
}
