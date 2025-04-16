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
    public function edit(Surat $surat) {
        $detailSurat = DetailSurat::where('surat_id', $surat->id)
        ->with(['surat.jenisSurat'])
        ->first();

        $jenisSurat = JenisSurat::all();

        return view('mahasiswa.edit', compact('detailSurat', 'jenisSurat'));
    }
    public function update(Request $request, DetailSurat $suratId) {

        $suratId->update([
            'alamat' => $request->alamat,
            'semester' => $request->semester,
            'keperluan' => $request->keperluan,
            'kode_mata_kuliah' => $request->kode_mata_kuliah,
            'mata_kuliah' => $request->mata_kuliah,
            'tujuan_topik' => $request->tujuan_topik,
        ]);

        Surat::where('id', $suratId->surat_id)->update([
            'jenis_surat_id' => $request->jenis_surat_id,
        ]);

        return redirect()->route('dashboard');
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
            ->orderBy('created_at', 'asc')
            ->paginate(5);

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

    public function tuIndex()
    {
        $surats = Surat::where('status', 1)
            ->with(['user.programStudi'])
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('tu.index', compact('surats'));
    }

    public function tuEdit(Surat $surat) {
        $detailSurat = DetailSurat::where('surat_id', $surat->id)
        ->with(['surat.jenisSurat'])
        ->first();

        return view('tu.edit', compact('detailSurat'));
    }
    public function tuUpload(Request $request, Surat $surat) {
        $request->validate([
            'fileSurat' => ['required', 'mimes:pdf', 'max:10240'] 
        ]);

        $file = $request->file('fileSurat');
        $path = $file->store('pdfs','public');

        $surat->update([
            'status' => 3,
            'file_name' => $file -> getClientOriginalName(), 
            'file_path' => $path
        ]);

        return redirect()->route('tu.index');
    }
    public function tuHistory() {
        $user = auth()->user();
        $programStudiId = $user->program_studi_id;

        $surats = Surat::where('status', 3)
            ->with(['user.programStudi'])
            ->whereHas('user.programStudi', function ($query) use ($programStudiId) {
                $query->where('program_studi_id', $programStudiId);
            })
            ->get();
        
        return view('tu.history', compact('surats'));
    }
    public function download($id) {
        $surat = Surat::findOrFail($id);
        $filePath = storage_path('app/public/'.$surat->file_path);

        if(file_exists($filePath)) {
            return response()->download($filePath, $surat->file_name);
        } else {
            return redirect()->back()->with('error', 'File not found.');
        }
    }
}
