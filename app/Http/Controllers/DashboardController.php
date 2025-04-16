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
        

        $programStudiId = $user->program_studi_id;
    
        if ($role == 'kaprodi'){            
            $surats = Surat::where('status', 2)
                ->with(['user.programStudi'])
                ->whereHas('user.programStudi', function ($query) use ($programStudiId) {
                    $query->where('program_studi_id', $programStudiId);
                })
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get();
                
        } elseif ($role == 'mahasiswa'){
            $surats = auth()->user()->surat()
            ->orderBy('created_at', 'desc')
            ->take(5) 
            ->get();

        } elseif ($role == 'tu'){
            $surats = Surat::where('status', 1)
            ->with(['user.programStudi'])
            ->whereHas('user.programStudi', function ($query) use ($programStudiId) {
                $query->where('program_studi_id', $programStudiId);
            })
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        } else {
            $surats = [];
        }
        
        return view('dashboard', compact('user', 'role', 'surats')); 
    }
}
