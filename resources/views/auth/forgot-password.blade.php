@extends('layouts.guest')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white rounded-lg shadow-xl flex max-w-4xl w-full overflow-hidden">
        <!-- FORM -->
        <div class="w-full md:w-1/2 p-10 flex flex-col justify-center">
            <h2 class="text-2xl font-bold mb-1">Forgot Password?</h2>
            <p class="mb-8 text-gray-600">We'll send a password reset link to your email.</p>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="mb-4">
                    <input id="email" type="email" name="email" placeholder="Email" required class="w-full border rounded px-3 py-2 focus:outline-none focus:ring">
                </div>
                <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded font-bold hover:bg-indigo-700">Send Reset Link</button>
            </form>
            <div class="mt-4 text-sm text-gray-500">
                <a href="{{ route('login') }}" class="text-indigo-600 font-semibold hover:underline">Back to Login</a>
            </div>
        </div>
        <!-- IMAGE -->
        <div class="hidden md:flex md:w-1/2 bg-gray-200 items-center justify-center">
            <img src="/images/forgot-password.png" alt="Picture" class="max-w-s rounded" />
        </div>
    </div>
</div>
@endsection
