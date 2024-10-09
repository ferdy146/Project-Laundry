<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\ManagerController;


// Untuk tampilan Home
Route::get('/', [HomeController::class, 'index']);
Route::get('/tentang', [HomeController::class, 'tentang']);
Route::get('/layanan', [HomeController::class, 'layanan']);
Route::get('/kontak', [HomeController::class, 'kontak']);

// Untuk Login
Route::middleware('guest')->group(function () {
    Route::get('admin/login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('admin/login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});

//Pegawai
// Untuk tampilan Pegawai
Route::get('/pegawai/dashboard', [PegawaiController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('pegawai.dashboard');
Route::get('/pegawai/inputdata', [PegawaiController::class, 'inputdata'])->middleware(['auth', 'verified']);
Route::post('/pegawai/inputdata', [PegawaiController::class, 'store'])->middleware(['auth', 'verified'])->name('pegawai.store');
Route::get('pegawai/viewdata', [PegawaiController::class, 'viewdata'])->middleware(['auth', 'verified'])->name('pegawai.viewdata');
Route::get('pegawai/editdata/{id}', [PegawaiController::class, 'editdata'])->middleware(['auth', 'verified'])->name('pegawai.editdata');
Route::put('pegawai/update/{id}', [PegawaiController::class, 'update'])->middleware(['auth', 'verified'])->name('pegawai.update');
Route::delete('pegawai/delete/{id}', [PegawaiController::class, 'delete'])->middleware(['auth', 'verified'])->name('pegawai.delete');

// Untuk Presensi Pegawai
// Menampilkan halaman daftar presensi
Route::get('/pegawai/presensi', [PresensiController::class, 'presensi'])->middleware(['auth', 'verified'])->name('pegawai.presensi');

// Menampilkan halaman form tambah presensi
Route::get('/presensi/create', [PresensiController::class, 'presensi'])->middleware(['auth', 'verified'])->name('presensi.create');

// Menyimpan data presensi
Route::post('/presensi', [PresensiController::class, 'store'])->middleware(['auth', 'verified'])->name('presensi.store');

// Menampilkan halaman daftar presensi di dashboard pegawai
Route::get('/pegawai/viewpresensi', [PresensiController::class, 'viewpresensi'])->middleware(['auth', 'verified'])->name('pegawai.viewpresensi');

// Route untuk melihat file yang diupload
Route::get('/presensi/{id}/file', [PresensiController::class, 'showFile'])->name('presensi.file');


// Manager
Route::get('/manager/dashboard', [ManagerController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('manager.dashboard');
Route::get('/manager/inputdata', [ManagerController::class, 'inputdata'])->middleware(['auth', 'verified']);
Route::post('/manager/inputdata', [ManagerController::class, 'store'])->middleware(['auth', 'verified'])->name('manager.store');
Route::get('manager/viewdata', [ManagerController::class, 'viewdata'])->middleware(['auth', 'verified'])->name('manager.viewdata');
Route::get('manager/editdata/{id}', [ManagerController::class, 'editdata'])->middleware(['auth', 'verified'])->name('manager.editdata');
Route::put('manager/update/{id}', [ManagerController::class, 'update'])->middleware(['auth', 'verified'])->name('manager.update');
Route::delete('manager/delete/{id}', [ManagerController::class, 'delete'])->middleware(['auth', 'verified'])->name('manager.delete');
// Menampilkan halaman daftar presensi di dashboard Manager
Route::get('manager/viewpresensi', [PresensiController::class, 'viewpresensiManager'])->middleware(['auth', 'verified'])->name('manager.viewpresensi');

Route::get('/presensi/{id}/edit', [PresensiController::class, 'editpresensi'])->name('presensi.edit');
Route::put('/presensi/{id}', [PresensiController::class, 'update'])->name('presensi.update');
Route::delete('/presensi/{id}', [PresensiController::class, 'destroy'])->name('presensi.destroy');
