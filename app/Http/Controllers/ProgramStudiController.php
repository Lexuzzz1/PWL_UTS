<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class ProgramStudiController extends Controller
{
    public function index(){
        $programStudi = ProgramStudi::all();
        return view('programStudi.index', compact('programStudi'));
    }
}
