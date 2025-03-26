<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Memastikan relasi 'role' dimuat dengan benar
        $user = Auth::user()->load('role');  // Memuat relasi 'role' untuk pengguna yang sedang login
        $users = User::all();
        $jenisSurat = JenisSurat::all();  // Memuat semua jenis surat
        // Mengirimkan data pengguna ke view 'dashboard'
        return view('dashboard', compact('user', 'users', 'jenisSurat'));
    }
}
