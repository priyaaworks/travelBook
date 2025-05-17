<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //  Show the user registration form
    public function showForm()
    {
        return view('user.form');
    }

    //  Handle form submission and save data
    public function saveData(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        // Insert new user into the users table
        DB::table('users')->insert([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => bcrypt('defaultpassword')  // hashed default password
        ]);

        // Redirect to the user list page with success message
        return redirect()->route('user.list')->with('success', 'User added successfully!');
    }

    //  Display list of saved users
    public function showUsers()
    {
        $users = DB::table('users')->get();
        return view('user.userlist', compact('users'));
    }
}
