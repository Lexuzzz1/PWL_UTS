<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\DashboardController;

// Halaman utama langsung ke login
Route::get('/', function () {
    return view('auth.login');
});

// Proses login manual
Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');
    
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }

    return back()->with('status', 'Email atau password salah.');
})->name('login');

// Rute dashboard setelah login
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Proses logout
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');


// Rute untuk mengelola profil pengguna
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute untuk Kaprodi saja
Route::middleware(['auth', 'role:kaprodi'])->group(function () {
    Route::resource('surat', SuratController::class);
});

// Rute bawaan Laravel untuk auth
require __DIR__.'/auth.php';

Route::get('/suratskma',[SuratController::class, 'skma'])->name('mahasiswa.skma');