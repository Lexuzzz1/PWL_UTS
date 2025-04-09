<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user()->load('role');
        $users = User::all();
        $jenisSurat = JenisSurat::all();

        // Cek nama role
        $roleName = $user->role_id; // Pastikan field-nya adalah 'name'

        if ($roleName === 1) {
            return view('mahasiswa.mahasiswa', compact('user', 'users', 'jenisSurat'));
        } elseif ($roleName === 2) {
            return view('kaprodi.kaprodi', compact('user', 'users', 'jenisSurat'));
        } elseif ($roleName === 3) {
            return view('dashboard.tu', compact('user', 'users', 'jenisSurat'));
        } elseif ($roleName === 4) {
            return view('dashboard.admin', compact('user', 'users', 'jenisSurat'));
        } else {
            // Jika role tidak diketahui, bisa redirect atau tampilkan view default
            return abort(403, 'Unauthorized access');
        }
    }
}
