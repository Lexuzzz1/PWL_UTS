<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Role; 
use App\Models\ProgramStudi;
use Illuminate\Support\Facades\Redirect;

class RegisteredUserController extends Controller
{
    public function create()
    {
        $roles = Role::all();
        $programStudi = ProgramStudi::all(); 
        return view('auth.register', compact('roles', 'programStudi'));

        // return dd($programStudi);
    }

    public function store(Request $request)
{
    // Validasi input
    $data = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'program_studi' => ['required', 'exists:program_studi,id'],  
        'role_id' => ['required', 'exists:role,id'],  
    ]);

    
    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'program_studi' => $data['program_studi'],
        'role_id' => $data['role_id'],
    ]);

    event(new Registered($user));

    // Login otomatis setelah registrasi
    // Auth::login($user);

    return Redirect::route('login')->with('status', 'Akun berhasil dibuat. Silakan login.');
}

}
