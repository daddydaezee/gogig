@extends('layouts.app')
@section('title', 'Edit Event')
@section('content')
<div class="max-w-2xl mx-auto py-10">
    <h2 class="text-2xl font-bold mb-6">Edit Event</h2>

    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('events.update', $event) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1">Event Name</label>
            <input type="text" name="name" class="border p-2 rounded w-full" value="{{ old('name', $event->name) }}" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Location</label>
            <input type="text" name="location" class="border p-2 rounded w-full" value="{{ old('location', $event->location) }}" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Start Date</label>
            <input type="date" name="start_date" class="border p-2 rounded w-full" value="{{ old('start_date', $event->start_date) }}" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">End Date</label>
            <input type="date" name="end_date" class="border p-2 rounded w-full" value="{{ old('end_date', $event->end_date) }}" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Start Time</label>
            <input type="time" name="start_time" class="border p-2 rounded w-full" value="{{ old('start_time', $event->start_time) }}" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">End Time</label>
            <input type="time" name="end_time" class="border p-2 rounded w-full" value="{{ old('end_time', $event->end_time) }}" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Description</label>
            <textarea name="description" class="border p-2 rounded w-full" rows="4">{{ old('description', $event->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Event Poster</label>
            <input type="file" name="poster" accept="image/*" class="border p-2 rounded w-full">
            @if($event->poster)
                <img src="{{ asset('storage/'.$event->poster) }}" class="w-32 mt-2" />
            @endif
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Update Event</button>
    </form>
</div>
@endsection
