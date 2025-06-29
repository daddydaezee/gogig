@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="max-w-2xl mx-auto py-10">
    <h2 class="text-2xl font-bold mb-6">Edit Your Profile</h2>
    @if(session('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-5">
        @csrf

        <!-- Photo Upload -->
        <div>
            <label for="photo" class="block font-semibold">Profile Photo</label>
            <input type="file" name="photo" id="photo" class="border mt-1 px-3 py-1 rounded" />
            @if($profile && $profile->photo)
                <img src="{{ asset('storage/'.$profile->photo) }}" alt="Profile Photo" class="mt-2 h-24 w-24 rounded-full object-cover">
            @endif
        </div>

        <div>
            <label for="phone" class="block font-semibold">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $profile->phone ?? '') }}" class="border mt-1 px-3 py-1 rounded w-full">
        </div>

        <div>
            <label for="address" class="block font-semibold">Address</label>
            <input type="text" name="address" id="address" value="{{ old('address', $profile->address ?? '') }}" class="border mt-1 px-3 py-1 rounded w-full">
        </div>

        <div>
            <label for="bio" class="block font-semibold">Bio</label>
            <textarea name="bio" id="bio" rows="3" class="border mt-1 px-3 py-1 rounded w-full">{{ old('bio', $profile->bio ?? '') }}</textarea>
        </div>

        <div>
            <label for="social_ig" class="block font-semibold">Instagram</label>
            <input type="text" name="social_ig" id="social_ig" value="{{ old('social_ig', $profile->social_ig ?? '') }}" class="border mt-1 px-3 py-1 rounded w-full">
        </div>

        <div>
            <label for="social_fb" class="block font-semibold">Facebook</label>
            <input type="text" name="social_fb" id="social_fb" value="{{ old('social_fb', $profile->social_fb ?? '') }}" class="border mt-1 px-3 py-1 rounded w-full">
        </div>

        <div>
            <label for="social_x" class="block font-semibold">X (Twitter)</label>
            <input type="text" name="social_x" id="social_x" value="{{ old('social_x', $profile->social_x ?? '') }}" class="border mt-1 px-3 py-1 rounded w-full">
        </div>

        <div>
            <label for="social_email" class="block font-semibold">Contact Email</label>
            <input type="email" name="social_email" id="social_email" value="{{ old('social_email', $profile->social_email ?? '') }}" class="border mt-1 px-3 py-1 rounded w-full">
        </div>

        <div>
            <label for="social_phone" class="block font-semibold">Contact Phone</label>
            <input type="text" name="social_phone" id="social_phone" value="{{ old('social_phone', $profile->social_phone ?? '') }}" class="border mt-1 px-3 py-1 rounded w-full">
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700 font-semibold">
            Save Profile
        </button>
    </form>
</div>
@endsection
