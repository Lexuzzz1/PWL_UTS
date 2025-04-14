<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudi;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        $users = $query->paginate(5)->withQueryString();


        return view('user.index', compact('users'));
    }

    public function create()
    {
        $programStudi = ProgramStudi::all();
        $roles = Role::all();
        return view('user.create', compact('programStudi', 'roles'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nrp' => ['required', 'string', 'max:255', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'programStudi' => ['required'],
            'role' => ['required'],
        ]);


        $user = User::create([
            'nrp' => $request->nrp,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'program_studi_id' => $request->programStudi,
            'role_id' => $request->role
        ]);

        return redirect(route('user'));
    }

    public function edit(User $user)
    {
        $programStudi = ProgramStudi::all();
        $roles = Role::all();

        return view('user.edit', compact('user', 'programStudi', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'nrp' => ['required', 'string', 'max:255', 'unique:users,nrp,' . $user->id],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'programStudi' => ['required'],
            'role' => ['required'],
        ]);

        $user->update([
            'nrp' => $request->nrp,
            'name' => $request->name,
            'email' => $request->email,
            'program_studi_id' => $request->programStudi,
            'role_id' => $request->role,
        ]);
        return redirect(route('user'));
    }

    public function updateRole(User $user){
        $user->update([
            'role_id' => '5'
        ]);
        return redirect(route('user'));
    }
}
