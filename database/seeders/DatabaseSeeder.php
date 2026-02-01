<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Gestor',
            'email' => 'gestor@minhacena.pt',
            'password' => Hash::make('password'),
            'user_type' => 1,
        ]);
    }
}

