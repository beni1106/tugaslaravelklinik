<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// Data contoh dokter (Pertemuan 2: "isi minimal 2 data"). Dibuat 7 data supaya
// paginate(3) di Pertemuan 5 menghasilkan 3 halaman. Aman dijalankan berulang kali.
class DokterSeeder extends Seeder
{
    public function run(): void
    {
        $dokter = [
            ['d01', 'dr Fernando', 'Jantung',   '08122254'],
            ['d02', 'dr Ayu',      'Anak',      '081522233'],
            ['d03', 'dr Voni',     'Paru',      '0812121212'],
            ['d04', 'dr John',     'Kandungan', '081211112222'],
            ['d05', 'dr Sven',     'Umum',      '081233334444'],
            ['d06', 'dr Johny',    'Kandungan', '081255556666'],
            ['d07', 'dr Meri',     'Umum',      '081277778888'],
        ];

        foreach ($dokter as [$kode, $nama, $spesialis, $hp]) {
            DB::table('dokters')->updateOrInsert(
                ['kode_dokter' => $kode],
                [
                    'nama_dokter' => $nama,
                    'spesialis' => $spesialis,
                    'nomor_hp' => $hp,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
