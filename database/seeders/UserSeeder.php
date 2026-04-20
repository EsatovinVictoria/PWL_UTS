<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'level_id' => 1,
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'nama' => 'Administrator',
            'password' => bcrypt('12345'),
        ]);
    }
}