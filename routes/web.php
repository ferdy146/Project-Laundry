<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PresensiController;


// Untuk tampilan Home
Route::get('/', [HomeController::class, 'index']);
Route::get('/tentang', [HomeController::class, 'tentang']);
Route::get('/layanan', [HomeController::class, 'layanan']);
Route::get('/kontak', [HomeController::class, 'kontak']);


// Untuk tampilan Admin 
Route::get('/pegawai/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('pegawai.dashboard');
Route::get('/pegawai/inputdata', [AdminController::class, 'inputdata'])->middleware(['auth', 'verified']);
Route::post('/pegawai/inputdata', [AdminController::class, 'store'])->middleware(['auth', 'verified'])->name('pegawai.store');
Route::get('pegawai/viewdata', [AdminController::class, 'viewdata'])->middleware(['auth', 'verified'])->name('pegawai.viewdata');
Route::get('pegawai/editdata/{id}', [AdminController::class, 'editdata'])->middleware(['auth', 'verified'])->name('pegawai.editdata');
Route::put('pegawai/update/{id}', [AdminController::class, 'update'])->middleware(['auth', 'verified'])->name('pegawai.update');
Route::delete('pegawai/delete/{id}', [AdminController::class, 'delete'])->middleware(['auth', 'verified'])->name('pegawai.delete');


// Untuk Login
Route::middleware('guest')->group(function () {
    Route::get('pegawai/login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('pegawai/login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});

// Untuk Presensi Pegawai
// Menampilkan halaman daftar presensi
Route::get('/pegawai/presensi', [PresensiController::class, 'presensi'])->middleware(['auth', 'verified'])->name('pegawai.presensi');

// Menampilkan halaman form tambah presensi
Route::get('/presensi/create', [PresensiController::class, 'presensi'])->middleware(['auth', 'verified'])->name('presensi.create');

// Menyimpan data presensi
Route::post('/presensi', [PresensiController::class, 'store'])->middleware(['auth', 'verified'])->name('presensi.store');

// Menampilkan halaman daftar presensi di dashboard pegawai
Route::get('/pegawai/viewpresensi', [PresensiController::class, 'viewpresensi'])->middleware(['auth', 'verified'])->name('pegawai.viewpresensi');



