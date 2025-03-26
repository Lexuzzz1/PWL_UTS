<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\DashboardController;  // Pastikan DashboardController di-import

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk Dashboard yang hanya bisa diakses oleh pengguna yang sudah login dan terverifikasi
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Rute untuk mengelola profil pengguna (hanya untuk yang sudah login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute untuk mengelola surat (hanya bisa diakses oleh Kaprodi)
Route::middleware(['auth', 'role:kaprodi'])->group(function () {
    Route::resource('surat', SuratController::class);
});

require __DIR__.'/auth.php';
