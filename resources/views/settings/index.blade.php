@extends('layouts.app')
@section('title', 'User Settings')
@section('content')
<div class="max-w-xl mx-auto bg-white rounded shadow p-8 mt-8">
    <h2 class="text-2xl font-bold mb-4">Account Settings</h2>
    <form method="POST" action="{{ route('settings.update') }}">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block mb-1 font-medium">Email</label>
            <input name="email" type="email" class="w-full border rounded p-2" value="{{ $user->email }}">
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium">New Password</label>
            <input name="password" type="password" class="w-full border rounded p-2" placeholder="Leave blank to keep current">
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium">Confirm New Password</label>
            <input name="password_confirmation" type="password" class="w-full border rounded p-2">
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium">Email Notifications</label>
            <select name="notifications" class="w-full border rounded p-2">
                <option value="1" @if($user->notifications) selected @endif>Enabled</option>
                <option value="0" @if(!$user->notifications) selected @endif>Disabled</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Settings</button>
    </form>
</div>
@endsection
