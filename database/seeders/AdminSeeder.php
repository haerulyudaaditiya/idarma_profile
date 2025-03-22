<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => Str::uuid(),
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'), 
            'role' => 'admin',
            'img' => 'default.jpg', 
            'twiter' => 'https://twitter.com/admin',
            'facebok' => 'https://facebook.com/admin',
            'instagram' => 'https://instagram.com/admin',
            'linkedin' => 'https://linkedin.com/in/admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
