<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function index()
    {
        // Menampilkan daftar surat
        $surats = Surat::all();
        return view('surat.index', compact('surats'));
    }

    public function skma()
    {
        return view('skma');
    }

    public function create()
    {
        // Menampilkan form untuk membuat surat
        return view('surat.create');
    }

    public function store(Request $request)
    {
        // Menyimpan surat baru
        $request->validate([
            'jenis_surat' => 'required|string|max:255',
            'keperluan' => 'nullable|string',
        ]);

        Surat::create([
            'jenis_surat' => $request->jenis_surat,
            'keperluan' => $request->keperluan,
        ]);

        return redirect()->route('surat.index');
    }

    public function show(Surat $surat)
    {
        // Menampilkan detail surat
        return view('surat.show', compact('surat'));
    }

    public function edit(Surat $surat)
    {
        // Menampilkan form untuk mengedit surat
        return view('surat.edit', compact('surat'));
    }

    public function update(Request $request, Surat $surat)
    {
        // Memperbarui surat
        $request->validate([
            'jenis_surat' => 'required|string|max:255',
            'keperluan' => 'nullable|string',
        ]);

        $surat->update([
            'jenis_surat' => $request->jenis_surat,
            'keperluan' => $request->keperluan,
        ]);

        return redirect()->route('surat.index');
    }

    public function destroy(Surat $surat)
    {
        // Menghapus surat
        $surat->delete();
        return redirect()->route('surat.index');
    }
}
