<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil seeder lain dari sini
        $this->call([
            KelasSeeder::class, // <-- BARIS INI WAJIB ADA
            // Anda bisa menambahkan seeder lain di sini jika ada
        ]);
    }
}
