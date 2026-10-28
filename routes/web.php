<?php

use App\Http\Controllers\DokterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Login, register, logout, dll. (dari laravel/ui - "php artisan ui bootstrap --auth")
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Pertemuan 3: hanya user yang sudah login yang boleh membuka data dokter.
// Route::resource membuat 7 route CRUD (lihat "php artisan route:list"):
//   GET  /dokter              dokter.index   -> index    (tampil data)
//   GET  /dokter/create       dokter.create  -> create   (form tambah)
//   POST /dokter              dokter.store   -> store    (simpan)
//   GET  /dokter/{id}         dokter.show    -> show
//   GET  /dokter/{id}/edit    dokter.edit    -> edit
//   PUT  /dokter/{id}         dokter.update  -> update
//   DELETE /dokter/{id}       dokter.destroy -> destroy
Route::middleware('auth')->group(function () {

    Route::resource('dokter', DokterController::class);

});
