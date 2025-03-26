<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;

class UploadController extends Controller
{
    // Menampilkan form untuk upload surat
    public function create(Surat $surat)
    {
        return view('upload.create', compact('surat'));
    }

    // Menyimpan file surat yang diupload
    public function store(Request $request, Surat $surat)
    {
        $request->validate([
            'surat_file' => 'required|file|mimes:pdf,docx|max:2048',
        ]);

        // Menyimpan file yang diupload
        $filePath = $request->file('surat_file')->store('surat_uploads', 'public');

        // Menyimpan informasi file ke dalam database
        $surat->update([
            'surat_file' => $filePath,
            'status' => 'approved',  // Mengubah status setelah diupload
        ]);

        return redirect()->route('surat.index')->with('success', 'Surat berhasil diupload!');
    }
}
