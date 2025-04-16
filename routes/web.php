<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\ProgramStudiController;

Route::get('/', function () {
    return view('auth.login');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    // ----------------- User -----------------------
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::put('/user/{user}/role', [UserController::class, 'updateRole'])->name('user.role');
    // ----------------- Jenis Surat -----------------------
    Route::get('/jenisSurat', [JenisSuratController::class, 'index'])->name('jenisSurat');
    Route::get('/jenisSurat/create', [JenisSuratController::class, 'create'])->name('jenisSurat.create');
    Route::post('/jenisSurat', [JenisSuratController::class, 'store'])->name('jenisSurat.store');
    Route::get('/jenisSurat/{jenisSurat}/edit}',[JenisSuratController::class, 'edit'])->name('jenisSurat.edit');
    Route::put('/jenisSurat/{jenisSurat}', [JenisSuratController::class, 'update'])->name('jenisSurat.update');
    Route::put('jenisSurat/{jenisSurat}/status', [JenisSuratController::class, 'updateStatus'])->name('jenisSurat.status');
    // ----------------- Program Studi -----------------------
    Route::get('/programStudi', [ProgramStudiController::class, 'index'])->name('programStudi');
    Route::get('/programStudi/create', [ProgramStudiController::class, 'create'])->name('programStudi.create');
    Route::post('/programStudi', [ProgramStudiController::class, 'store'])->name('programStudi.store');
    Route::get('/programStudi/{programStudi}/edit}',[ProgramStudiController::class, 'edit'])->name('programStudi.edit');
    Route::put('/programStudi/{programStudi}', [ProgramStudiController::class, 'update'])->name('programStudi.update');
});

// mahasiswa
Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/surat/create', [SuratController::class, 'create'])->name('surat.create');
    Route::post('/surat', [SuratController::class, 'store'])->name('surat.store');
    Route::get('/surat/history', [SuratController::class, 'history'])->name('surat.history');
    Route::get('/surat/download/{surat}', [SuratController::class, 'download'])->name('surat.download');
    Route::put('/surat/{surat}', [SuratController::class, 'update'])->name('surat.update');
    Route::get('/surat/{surat}/edit',[SuratController::class, 'edit'])->name('surat.edit');
});

//kaprodi
Route::middleware(['auth', 'role:kaprodi'])->group(function () {
    Route::get('/pengajuanSurat', [SuratController::class, 'kaprodiIndex'])->name('kaprodi.index');
    Route::get('/pengajuanSurat/{surat}/edit', [SuratController::class, 'kaprodiEdit'])->name('kaprodi.edit');
    Route::put('/pengajuanSurat/{surat}', [SuratController::class, 'kaprodiUpdate'])->name('kaprodi.update');
    Route::get('/pengajuanSurat/history', [SuratController::class, 'kaprodiHistory'])->name('kaprodi.history');
});

//tu
Route::middleware(['auth', 'role:tu'])->group(function () {
    Route::get('/pembuatanSurat', [SuratController::class, 'tuIndex'])->name('tu.index');
    Route::get('/pembuatanSurat/{surat}/edit', [SuratController::class, 'tuEdit'])->name('tu.edit');
    Route::put('/pembuatanSurat/{surat}', [SuratController::class, 'tuUpload'])->name('tu.upload');
    Route::get('/pembuatan/history', [SuratController::class, 'tuHistory'])->name('tu.history');
});



require __DIR__.'/auth.php';
