<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Validasi kredensial pengguna
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba untuk login
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            // Redirect berdasarkan role pengguna
            if ($user->role == 'Admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role == 'Kaprodi') {
                return redirect()->route('kaprodi.dashboard');
            } elseif ($user->role == 'Mahasiswa') {
                return redirect()->route('mahasiswa.dashboard');
            }elseif ($user->role == 'TU') {
                return redirect()->route('tu.dashboard');
            }

        }

        // Jika login gagal
        return back()->withErrors([
            'email' => 'Kredensial tidak sesuai.',
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
