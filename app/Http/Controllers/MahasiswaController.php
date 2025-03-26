<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat; // Pastikan model JenisSurat di-import
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
{
    // Fetching the jenis surat from the database
    $jenisSurat = JenisSurat::all();  // Make sure to use the correct model and method

    dd($jenisSurat);
    // Passing $jenisSurat to the view
    return view('dashboard.mahasiswa', compact('jenisSurat'));
}
}
