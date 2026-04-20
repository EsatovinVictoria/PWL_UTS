<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelSeeder extends Seeder
{
    public function run(): void
    {
        Level::create([
            'level_kode' => 'ADM',
            'level_nama' => 'Admin',
        ]);
    }
}