<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Validation (require all the fields)
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'role' => 'required|in:performer,organizer',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Create user
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        // Optionally, create blank profile
        Profile::create([
            'user_id' => $user->id,
            // add any defaults if you want
        ]);

        event(new Registered($user));
        auth()->login($user);

        return redirect()->route('dashboard');
    }
}
