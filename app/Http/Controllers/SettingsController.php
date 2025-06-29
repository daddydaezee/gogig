<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    // Only logged in user (any role)
    public function index()
    {
        $user = auth()->user();
        return view('settings.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'email' => 'required|email',
            'password' => 'nullable|min:8|confirmed',
        ]);
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return back()->with('success', 'Settings updated!');
    }
}
