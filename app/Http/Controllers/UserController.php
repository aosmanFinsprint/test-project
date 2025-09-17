<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // CREATE (already done)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name'  => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'phone'       => 'required|string|max:20',
            'email'       => 'required|email|unique:users,email',
        ]);

        User::create($validated);

        return redirect('/home')->with('success', 'User added successfully!');
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
        ]);

        $user = User::findOrFail($id);
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
}
