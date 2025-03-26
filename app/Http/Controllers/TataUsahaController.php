<?php

namespace App\Http\Controllers;

use App\Models\User;

class TataUsahaController extends Controller
{
    // Menampilkan dashboard
    public function index()
    {
        return view('dashboard');
    }

    // Menampilkan daftar pengguna
    public function users()
    {
        $users = User::all(); // Mengambil semua data pengguna
        return view('users.index', compact('users'));
    }
}
