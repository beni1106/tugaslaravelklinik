<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Isi data contoh: php artisan db:seed
     * (User dibuat lewat halaman Register, seperti di perkuliahan.)
     */
    public function run(): void
    {
        $this->call([
            DokterSeeder::class,
            PasienSeeder::class,
        ]);
    }
}
