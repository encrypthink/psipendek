<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'registration_number' => 'required|min:5',
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'role' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);

        $users = User::create([
            'registration_number' => $request->registration_number,
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('users.index')->with('success', 'Success create new User.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.update', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'registration_number' => 'required|min:5',
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'role' => 'required',
        ]);

        $user->registration_number = $request->registration_number;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();

        return redirect()->route('users.index')->with('success', 'Success update User.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Success delete User.');
    }
}
