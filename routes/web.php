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
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('admin.dashboard');
Route::get('/admin/inputdata', [AdminController::class, 'inputdata'])->middleware(['auth', 'verified']);
Route::post('/admin/inputdata', [AdminController::class, 'store'])->middleware(['auth', 'verified'])->name('admin.store');
Route::get('admin/viewdata', [AdminController::class, 'viewdata'])->middleware(['auth', 'verified'])->name('admin.viewdata');
Route::get('admin/editdata/{id}', [AdminController::class, 'editdata'])->middleware(['auth', 'verified'])->name('admin.editdata');
Route::put('admin/update/{id}', [AdminController::class, 'update'])->middleware(['auth', 'verified'])->name('admin.update');
Route::delete('admin/delete/{id}', [AdminController::class, 'delete'])->middleware(['auth', 'verified'])->name('admin.delete');


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

// Untuk Presensi Pegawai
// Menampilkan halaman daftar presensi
Route::get('/admin/presensi', [PresensiController::class, 'presensi'])->middleware(['auth', 'verified'])->name('admin.presensi');

// Menampilkan halaman form tambah presensi
Route::get('/presensi/create', [PresensiController::class, 'presensi'])->middleware(['auth', 'verified'])->name('presensi.create');

// Menyimpan data presensi
Route::post('/presensi', [PresensiController::class, 'store'])->middleware(['auth', 'verified'])->name('presensi.store');

// Menampilkan halaman daftar presensi di dashboard admin
Route::get('/admin/viewpresensi', [PresensiController::class, 'viewpresensi'])->middleware(['auth', 'verified'])->name('admin.viewpresensi');



