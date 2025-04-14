<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        $user = $request->user();
        $role = $user->role->name;
        $surats = auth()->user()->surat()
            ->where('status', 2) 
            ->orderBy('created_at', 'desc')
            ->take(5) 
            ->get();

        return view('dashboard', compact('user', 'role', 'surats')); 
    }
}
