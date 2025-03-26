<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KaprodiController;
use App\Http\Controllers\TataUsahaController;

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    // Rute untuk tampilan dan penyimpanan registrasi
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store'])
        ->name('registerStore');

    // Rute untuk tampilan dan proses login
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    // Rute untuk pengaturan password
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

// mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');


// TU register 
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('registerStore');
// Halaman daftar pengguna untuk TU
Route::get('/users', [TataUsahaController::class, 'users'])->name('users');



// untuk masing masing role
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:Kaprodi'])->group(function () {
    Route::get('/kaprodi-dashboard', [KaprodiController::class, 'index'])->name('kaprodi.dashboard');
});

Route::middleware(['auth', 'role:Mahasiswa'])->group(function () {
    Route::get('/mahasiswa-dashboard', [MahasiswaController::class, 'index'])->name('mahasiswa.dashboard');
});

Route::middleware(['auth', 'role:TU'])->group(function () {
    Route::get('/tatausaha-dashboard', [TataUsahaController::class, 'index'])->name('tu.dashboard');
});


Route::middleware('auth')->group(function () {
    // Rute untuk verifikasi email
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    // Rute untuk konfirmasi password
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    // Rute untuk update password
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    // Rute untuk logout
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

