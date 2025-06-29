<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;

class ProfileController extends Controller
{
    // Only the logged in user can view/edit their profile
    public function show()
    {
        $user = auth()->user();
        $profile = $user->profile;
        $media = $user->media ?? collect();

        // Only fetch reviews for non-admins
        $reviews = ($user->role !== 'admin')
            ? $user->receivedReviews()->latest()->with('reviewer')->get()
            : collect();

        return view('profile.show', [
            'user' => $user,
            'profile' => $profile,
            'media' => $media,
            'reviews' => $reviews,
        ]);
    }

    public function edit()
    {
        $user = auth()->user();
        $profile = $user->profile;
        return view('profile.edit', compact('user', 'profile'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'photo' => 'nullable|image|max:2048',
            'phone' => 'nullable|string|max:30',
            'address' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:1000',
            'social_ig' => 'nullable|string|max:100',
            'social_fb' => 'nullable|string|max:100',
            'social_x' => 'nullable|string|max:100',
            'social_email' => 'nullable|email',
            'social_phone' => 'nullable|string|max:30',
        ]);

        $profile = $user->profile ?? new Profile(['user_id' => $user->id]);
        $profile->fill($request->only([
            'phone', 'address', 'bio',
            'social_ig', 'social_fb', 'social_x',
            'social_email', 'social_phone'
        ]));

        if ($request->hasFile('photo')) {
            $profile->photo = $request->file('photo')->store('profile_photos', 'public');
        }
        $profile->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated!');
    }

    // PUBLIC profile
    public function showPublic($id)
    {
        $user = \App\Models\User::findOrFail($id);

        // Prevent public viewing of admin profiles
        if ($user->role === 'admin') {
            abort(404);
        }

        $profile = $user->profile;
        $media = $user->media ?? collect();
        $reviews = $user->receivedReviews()->latest()->with('reviewer')->get();

        return view('profile.show', [
            'user' => $user,
            'profile' => $profile,
            'media' => $media,
            'reviews' => $reviews,
            'public' => true,
        ]);
    }
}
