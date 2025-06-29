@extends('layouts.app')
@section('title', 'Sponsor Requests')
@section('content')
<div class="max-w-3xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-4">Request Sponsorship</h2>
    <form method="POST" action="{{ route('sponsorships.request', $event->id) }}">
        @csrf
        <div class="mb-4">
            <label class="block mb-1">Select Sponsor</label>
            <select name="sponsor_id" class="border rounded w-full p-2" required>
                <option value="">Choose Sponsor</option>
                @foreach($sponsors as $sponsor)
                    <option value="{{ $sponsor->id }}">{{ $sponsor->name }} ({{ $sponsor->type }})</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Message (optional)</label>
            <textarea name="message" class="border rounded w-full p-2" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Request Sponsorship</button>
    </form>
    <a href="{{ route('dashboard') }}" class="mt-4 inline-block text-indigo-700 hover:underline">Back to Dashboard</a>
</div>
@endsection
