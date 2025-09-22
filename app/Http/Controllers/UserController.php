<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // REGISTER
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name'  => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'phone'       => 'required|string|max:20',
            'email'       => 'required|email|unique:users,email',
            'password'    => 'required|string|min:6|confirmed', // confirm with password_confirmation
        ]);

        // Hash password
        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect('/login')->with('success', 'Account created successfully! Please log in.');
    }

    // LOGIN
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect('/home')->with('success', 'Welcome back!');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials provided.',
        ])->onlyInput('email');
    }

    // LOGOUT
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out.');
    }

    // READ (Show one user)
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('show-user', compact('user'));
    }

    // UPDATE (Edit + Save)
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('edit-user', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'first_name'  => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'phone'       => 'required|string|max:20',
            'email'       => 'required|email|unique:users,email,' . $id,
            'password'    => 'nullable|string|min:6|confirmed',
        ]);

        $user = User::findOrFail($id);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect('/home')->with('success', 'User updated successfully!');
    }

    // DELETE
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/home')->with('success', 'User deleted successfully!');
    }

    public function index()
    {
        $users = User::all();
        return view('home', compact('users'));
    }

}
