<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Enums\UserRole;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@123.com',
            'password' => Hash::make('123'),
            'role' => UserRole::Admin,
        ]);

        User::create([
            'name' => 'User1',
            'email' => 'user1@123.com',
            'password' => Hash::make('123'),
            'role' => UserRole::User,
        ]);

        User::create([
            'name' => 'User2',
            'email' => 'user2@123.com',
            'password' => Hash::make('123'),
            'role' => UserRole::User,
        ]);
    }
}
