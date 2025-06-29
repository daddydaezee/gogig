@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-12 bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Create New Event</h2>
    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block font-semibold mb-1">Event Name</label>
            <input type="text" name="name" class="w-full border px-3 py-2 rounded" required value="{{ old('name') }}">
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Location</label>
            <input type="text" name="location" class="w-full border px-3 py-2 rounded" required value="{{ old('location') }}">
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Start Date</label>
            <input type="date" name="start_date" class="w-full border px-3 py-2 rounded" required value="{{ old('start_date') }}">
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">End Date</label>
            <input type="date" name="end_date" class="w-full border px-3 py-2 rounded" required value="{{ old('end_date') }}">
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Start Time</label>
            <input type="time" name="start_time" class="w-full border px-3 py-2 rounded" required value="{{ old('start_time') }}">
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">End Time</label>
            <input type="time" name="end_time" class="w-full border px-3 py-2 rounded" required value="{{ old('end_time') }}">
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Description</label>
            <textarea name="description" class="w-full border px-3 py-2 rounded">{{ old('description') }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Event Poster (optional)</label>
            <input type="file" name="poster" accept="image/*" class="w-full">
        </div>
        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded font-bold">Create Event</button>
    </form>
</div>
@endsection
