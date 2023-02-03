<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
// use Illuminate\Foundation\Auth\User;

class UserController extends Controller
{
    // Show Register/Create Form
    public function create(){
        return view('users.register');
    }

    // Create New User
    public function store(Request $request) {
        $formFields = $request->validate([
            // Must be required and have a minimum length of 3 characters: 'min:3'
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            // Must be confirmed by a second field with the same name and an "_confirmation" suffix: 'confirmed' Must have a minimum length of 6 characters: 'min:6' in an array of rules
            'password' => ['required', 'confirmed', 'min:6'],

            // //uses the "pipe" (|) separator for the rules:
            // 'password' => 'required|confirmed|min:6'
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);

        // Login User
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }

    // Log User Out
    public function logout(Request $request) {
        // remove the authentication information from user's session
        auth()->logout();

        // Invalidate the user's session and reset the user's CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Logout activity flash message
        return redirect('/')->with('message', 'You have been logged out');
    }

    // Show Login Form
    public function login() {
        return view('users.login');
    }

    // Authenticate the User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        // Attempt to log the user in
        if(auth()->attempt($formFields)) {

            // if Auth attempt is true | valid email and password
            $request->session()->regenerate(); // generate a session ID

            // Redirect User with CSRF tokken and flash message
            return redirect('/')->with('message', 'You have successfully logged in!');
        }

        // Login Attempt fails, return with invalid credentials error message
        return back()->withErrors(['email' => 'Your Login Credentials is Invalid'])->onlyInput('email');

    }
}
