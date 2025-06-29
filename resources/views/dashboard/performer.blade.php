@extends('layouts.app')
@section('title', 'Performer Dashboard')
@section('content')
<div class="max-w-6xl mx-auto py-8">

    <h2 class="text-xl font-bold mb-4">Hi, <span class="text-indigo-700">{{ Auth::user()->username }}</span></h2>

    {{-- Applied Events --}}
    <h3 class="text-lg font-bold mb-2">Applied Events</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-8">
        @forelse($appliedEvents as $app)
            <div class="bg-white rounded-lg shadow p-2 flex flex-col items-center">
                <img src="{{ $app->event->poster ? asset('storage/'.$app->event->poster) : asset('images/event-placeholder.png') }}" class="w-48 h-32 object-cover rounded mb-2" />
                <div class="font-semibold">{{ $app->event->name ?? '-' }}</div>
                <div class="text-sm text-gray-500">{{ $app->event->location ?? '-' }}</div>
                <div class="text-xs text-gray-400 mb-1">{{ $app->event->start_date ?? '-' }}</div>
                <span>Status: <b>{{ ucfirst($app->status) }}</b></span>
                <a href="{{ route('events.show', $app->event->id) }}" class="btn btn-sm mt-2">Detail</a>
            </div>
        @empty
            <div class="col-span-3 text-gray-400 py-8 text-center">No events applied yet.</div>
        @endforelse
    </div>

    {{-- Upcoming Events --}}
    <div class="flex items-center mb-2">
        <h3 class="text-lg font-bold">Upcoming Events</h3>
        <a href="{{ route('events.index') }}" class="ml-auto text-indigo-600 hover:underline text-sm">See More &gt;</a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-8">
        @forelse($upcomingEvents as $event)
            <div class="bg-white rounded-lg shadow p-2 flex flex-col items-center">
                <img src="{{ $event->poster ? asset('storage/'.$event->poster) : asset('images/event-placeholder.png') }}" class="w-48 h-32 object-cover rounded mb-2" />
                <div class="font-semibold">{{ $event->name }}</div>
                <div class="text-sm text-gray-500">{{ $event->location }}</div>
                <div class="text-xs text-gray-400 mb-1">{{ $event->start_date }}</div>
                <form action="{{ route('events.apply', $event) }}" method="POST">@csrf
                    <button class="btn btn-sm">Apply</button>
                </form>
            </div>
        @empty
            <div class="col-span-3 text-gray-400 py-8 text-center">No upcoming events available.</div>
        @endforelse
    </div>
</div>
@endsection
