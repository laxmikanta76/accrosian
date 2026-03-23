<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'laxmikantabarik27@gmail.com'],
            [
                'name'     => 'Laxmikanta Barik',
                'email'    => 'laxmikantabarik27@gmail.com',
                'password' => Hash::make('admin123'),
                'role'     => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'user@example.com'],
            [
                'name'     => 'Demo User',
                'email'    => 'user@example.com',
                'password' => Hash::make('password123'),
                'role'     => 'user',
            ]
        );
    }
}