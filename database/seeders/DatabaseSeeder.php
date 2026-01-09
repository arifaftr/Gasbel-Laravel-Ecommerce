<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@antarbit.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password123'),
                'is_admin' => true,
            ]
        );

        User::updateOrCreate(
            ['email' => 'user@antarbit.com'],
            [
                'name' => 'User',
                'password' => Hash::make('password123'),
                'is_admin' => false,
            ]
        );
    }
}
