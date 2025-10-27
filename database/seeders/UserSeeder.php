<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::updateOrCreate(
            ['email' => 'admin@desa.com'],
            [
                'name' => 'Admin Desa',
                'password' => 'admin123', // otomatis hash karena User model cast 'hashed'
                'role' => 'admin',
            ]
        );

        // User biasa 1
        User::updateOrCreate(
            ['email' => 'user1@desa.com'],
            [
                'name' => 'User Biasa 1',
                'password' => 'user123',
                'role' => 'user',
            ]
        );

        // User biasa 2
        User::updateOrCreate(
            ['email' => 'user2@desa.com'],
            [
                'name' => 'User Biasa 2',
                'password' => 'user123',
                'role' => 'user',
            ]
        );
    }
}
