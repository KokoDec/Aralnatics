<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    /**
     * Show the registration form
     */
    public function showRegister()
    {
        return redirect('/')->with('open_register', true);
    }

    /**
     * Handle registration
     */
    public function register(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        // Create the user
        $user = User::create([
            'name' => $validated['username'],
            'email' => $validated['username'] . '@example.com', // Temporary email since you only want username
            'password' => Hash::make($validated['password']),
        ]);

        // Log the user in
        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Account created successfully!');
    }

    /**
     * Show the login form
     */
    public function showLogin()
    {
        return redirect('/')->with('open_login', true);
    }

    /**
     * Handle login
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // Try to authenticate using the name field (since we're using username)
        if (Auth::attempt(['name' => $credentials['username'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return redirect('/')->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->with('open_login', true)->withInput();
    }

    /**
     * Handle logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}