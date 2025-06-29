@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-16 bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Reset Password</h2>
    @if (session('status'))
        <div class="mb-4 text-green-600">{{ session('status') }}</div>
    @endif
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ request()->query('email', old('email')) }}">

        <div class="mb-4">
            <label class="block mb-1 font-semibold">New Password</label>
            <input type="password" name="password" required class="w-full border px-3 py-2 rounded" autofocus>
            @error('password') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>
        <div class="mb-6">
            <label class="block mb-1 font-semibold">Confirm Password</label>
            <input type="password" name="password_confirmation" required class="w-full border px-3 py-2 rounded">
            @error('password_confirmation') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-2 rounded">Reset Password</button>
    </form>
</div>
@endsection
