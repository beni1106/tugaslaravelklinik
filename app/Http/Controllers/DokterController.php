<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

// Pertemuan 3 - php artisan make:controller DokterController -r
class DokterController extends Controller
{
    /**
     * Tampil data dokter (Read) - Pertemuan 3, ditambah paginate di Pertemuan 5.
     */
    public function index()
    {
        // Pertemuan 5: paginate(3) -> setiap 3 baris muncul halaman baru.
        // Opsional (urut dari data terbaru): Dokter::orderBy('id', 'desc')->paginate(3)
        $data['dokter'] = Dokter::paginate(3);
        $data['judul'] = 'Data Dokter';

        return view('dokter_index', $data);
    }

    /**
     * Tampilkan form tambah data dokter (Create) - Pertemuan 4.
     */
    public function create()
    {
        $data['list_sp'] = ['Umum', 'Kandungan', 'Anak', 'Tht'];

        return view('dokter_create', $data);
    }

    /**
     * Simpan data dokter (Create) - Pertemuan 4, validasi + pesan di Pertemuan 5.
     */
    public function store(Request $request)
    {
        // Pertemuan 5: validasi. Semua field wajib diisi dan kode_dokter tidak boleh sama (unique).
        $request->validate([
            'kode_dokter' => 'required|unique:dokters,kode_dokter',
            'nama_dokter' => 'required',
            'spesialis' => 'required',
            'nomor_hp' => 'required',
        ]);

        $dokter = new Dokter();
        $dokter->kode_dokter = $request->kode_dokter;
        $dokter->nama_dokter = $request->nama_dokter;
        $dokter->spesialis = $request->spesialis;
        $dokter->nomor_hp = $request->nomor_hp;
        $dokter->save();

        // Kembali ke halaman sebelumnya dan tampilkan pesan (dibaca di layouts/app.blade.php).
        return back()->with('pesan', 'Data sudah Disimpan');
    }

    /**
     * Tampil satu data dokter - belum dikerjakan di Pertemuan 1-5.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Form ubah data (Update) - belum dikerjakan di Pertemuan 1-5.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Ubah data (Update) - belum dikerjakan di Pertemuan 1-5.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Hapus data (Delete) - belum dikerjakan di Pertemuan 1-5.
     */
    public function destroy(string $id)
    {
        //
    }
}
