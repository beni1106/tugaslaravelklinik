<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// Data contoh pasien (Pertemuan 2: "isi minimal 2 data untuk tabel pasien").
class PasienSeeder extends Seeder
{
    public function run(): void
    {
        $pasien = [
            ['p01', 'Budi Santoso', 'Laki-laki', 'Umum', 'Jl. Melati No. 10, Jakarta'],
            ['p02', 'Siti Aminah',  'Perempuan', 'BPJS', 'Jl. Kenanga No. 5, Jakarta'],
        ];

        foreach ($pasien as [$kode, $nama, $jk, $status, $alamat]) {
            DB::table('pasiens')->updateOrInsert(
                ['kode_pasien' => $kode],
                [
                    'nama_pasien' => $nama,
                    'jenis_kelamin' => $jk,
                    'status' => $status,
                    'alamat' => $alamat,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
