<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use Illuminate\Http\Request;

class JenisSuratController extends Controller
{
    public function index(Request $request)
    {
        $query = JenisSurat::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        $jenisSurat = $query->paginate(5)->withQueryString();

        return view('jenisSurat.index', compact('jenisSurat'));
    }

    public function create()
    {
        return view('jenisSurat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:jenis_surat,name'],
            'status' => ['required', 'in:0,1'],
            'deskripsi' => ['string', 'max:255'],
        ]);

        $jenisSurat = JenisSurat::create([
            'name' => $request->name,
            'status' => $request->status,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('jenisSurat');
    }

    public function edit(JenisSurat $jenisSurat)
    {
        return view('jenisSurat.edit', compact('jenisSurat'));
    }

    public function update(Request $request, JenisSurat $jenisSurat)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:jenis_surat,name,' . $jenisSurat->id],
            'status' => ['required', 'in:0,1'],
            'deskripsi' => ['string', 'max:255'],
        ]);

        $jenisSurat->update([
            'name' => $request->name,
            'status' => $request->status,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('jenisSurat');
    }

    public function updateStatus(JenisSurat $jenisSurat)
    {
        if ($jenisSurat->status == 1) {
            $jenisSurat->update([
                'status' => 0
            ]);
        } elseif ($jenisSurat->status == 0){
            $jenisSurat->update([
                'status' => 1
            ]);
        }
        return redirect()->route('jenisSurat');
    }
}
