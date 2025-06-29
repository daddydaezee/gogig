<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Show the login view.
     */
    public function create()
    {
        return view('auth.login'); // or just 'login' if your view is resources/views/login.blade.php
    }

    /**
     * Handle login.
     */
    public function store(Request $request)
    {
        // Validate username & password fields
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        // To allow login by email as well, uncomment the next block:
        
        $login_type = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $credentials = [
            $login_type => $request->username,
            'password' => $request->password,
        ];
        

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withInput($request->only('username'))
                     ->with('error', 'Login failed. Please check your username and password.');
    }

    /**
     * Log out
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
