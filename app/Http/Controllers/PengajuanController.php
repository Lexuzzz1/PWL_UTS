<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;

class PengajuanController extends Controller
{
    // Menampilkan form pengajuan surat
    public function create()
    {
        return view('pengajuan.create');
    }

    // Menyimpan pengajuan surat
    public function store(Request $request)
    {
        $request->validate([
            'jenis_surat' => 'required|string|max:255',
            'keperluan' => 'nullable|string',
        ]);

        Surat::create([
            'jenis_surat' => $request->jenis_surat,
            'keperluan' => $request->keperluan,
            'status' => 'pending', // status pengajuan awal
        ]);

        return redirect()->route('pengajuan.create')->with('success', 'Pengajuan surat berhasil dilakukan!');
    }
}
