<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Pertemuan 2 - php artisan make:migration create_administrasis_table
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('administrasis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->integer('pasien_id');
            $table->integer('dokter_id');
            $table->integer('biaya');
            // Sesuai modul: $table->timestamps() pada tabel ini dihapus.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrasis');
    }
};
