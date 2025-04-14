<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\JenisSurat;
use App\Models\DetailSurat;

class SuratController extends Controller
{
    public function mahasiswaIndex()
    {
        return view('mahasiswa.index');
    }

    public function create()
    {
        $jenisSurat = JenisSurat::where('status', '1')->get();
        return view('mahasiswa.form', compact('jenisSurat'));
    }

    public function store(Request $request)
    {

        $surat = Surat::create([
            'status' => '2',
            'jenis_surat_id' => $request->jenis_surat_id,
            'user_id' => auth()->user()->id,
        ]);

        DetailSurat::create([
            'nrp' => $request->nrp,
            'name' => $request->name,
            'alamat' => $request->alamat,
            'semester' => $request->semester,
            'keperluan' => $request->keperluan,
            'kode_mata_kuliah' => $request->kode_mata_kuliah,
            'mata_kuliah' => $request->mata_kuliah,
            'tujuan_topik' => $request->tujuan_topik,
            'surat_id' => $surat->id,
        ]);

        return redirect()->route('dashboard');
    }

    public function history()
    {
        $user = auth()->user();
        $surats = Surat::where('user_id', $user->id)->where('status', '!=', 2)
            ->get();
        return view('mahasiswa.history', compact('surats'));
    }

    public function kaprodiIndex()
    {
        $user = auth()->user();
        $programStudiId = $user->program_studi_id;


        $surats = Surat::where('status', 2)
            ->with(['user.programStudi'])
            ->whereHas('user.programStudi', function ($query) use ($programStudiId) {
                $query->where('program_studi_id', $programStudiId);
            })
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Kirim data ke view
        return view('kaprodi.index', compact('surats'));
    }

    public function kaprodiEdit(Surat $surat)
    {
        $detailSurat = DetailSurat::where('surat_id', $surat->id)
        ->with(['surat.jenisSurat'])
        ->first();

        return view('kaprodi.edit', compact('detailSurat'));
    }

    public function kaprodiUpdate(Request $request, Surat $surat)
    {   
        $surat->update([
            'status' => $request->status,
        ]);

        return redirect()->route('kaprodi.index');
    }

    public function kaprodiHistory()
    {
        $user = auth()->user();
        $programStudiId = $user->program_studi_id;

        $surats = Surat::where('status', '!=', 2)
            ->with(['user.programStudi'])
            ->whereHas('user.programStudi', function ($query) use ($programStudiId) {
                $query->where('program_studi_id', $programStudiId);
            })
            ->get();

        return view('kaprodi.history', compact('surats'));
    }

}
