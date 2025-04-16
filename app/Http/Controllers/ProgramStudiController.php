<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class ProgramStudiController extends Controller
{
    public function index(){
        $programStudi = ProgramStudi::paginate(5);
        return view('programStudi.index', compact('programStudi'));
    }
    public function create(){
        return view('programStudi.create');
    }
    public function store(Request $request){
        $request->validate([
            'id' => 'required',
            'name' => ['required', 'string'],
        ]);

        $id=(int)$request->id;

        ProgramStudi::create([
            'id' => $id,
            'name' => $request->name,
        ]);

        return redirect()->route('programStudi');
    }
    public function edit(ProgramStudi $programStudi) {
        return view('programStudi.edit', compact('programStudi'));
    }
    public function update(Request $request, ProgramStudi $programStudi) {
        $request->validate([
            'name' => ['required', 'string']
        ]);

        $programStudi->update([
            'id' => $request->id,
            'name' => $request->name
        ]);

        return redirect()->route('programStudi');
    }
}