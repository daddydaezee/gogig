@extends('layouts.app')
@section('title', $event->name)
@section('content')
<div class="max-w-4xl mx-auto py-10">
    {{-- Big Poster at the Top --}}
    <div class="mb-6 flex justify-center">
        <img 
            src="{{ asset($event->poster ? 'storage/'.$event->poster : 'images/event-placeholder.png') }}" 
            alt="{{ $event->name }}"
            class="rounded-xl shadow-lg w-full max-w-3xl object-cover" 
            style="aspect-ratio: 16/7; background: #111;"/>
    </div>

    {{-- Name and Details --}}
    <h1 class="text-3xl md:text-4xl font-bold mb-2">{{ $event->name }}</h1>

    <div class="mb-4">
        <div class="mb-2"><span class="font-semibold">Location:</span> {{ $event->location }}</div>
        <div class="mb-2"><span class="font-semibold">Date:</span> {{ $event->start_date }} – {{ $event->end_date }}</div>
        <div class="mb-2"><span class="font-semibold">Time:</span> {{ $event->start_time ?? '-' }} – {{ $event->end_time ?? '-' }}</div>
        <div class="mb-2">
            <span class="font-semibold">Organizer:</span>
                @if($event->organizer)
                    <a href="{{ route('profile.public', $event->organizer->id) }}" class="text-indigo-700 hover:underline">
                        {{ $event->organizer->username }}
                    </a>
                @else
                    -
                @endif
        </div>
        <div class="mb-2"><span class="font-semibold">Description:</span>
            <p class="mt-1">{{ $event->description }}</p>
        </div>
    </div>

    {{-- Performers --}}
    <div class="mb-8">
        <h3 class="font-bold mb-2 text-lg">Line-Up / Performers</h3>
        <div class="flex flex-wrap gap-4">
            @forelse($performers as $perf)
                <div class="flex flex-col items-center">
                    @if($perf->profile && $perf->profile->photo)
                        <img src="{{ asset('storage/'.$perf->profile->photo) }}" class="h-14 w-14 rounded-full mb-1" />
                    @endif
                    <div class="text-sm font-semibold">
                        <a href="{{ route('profile.public', $perf->id) }}" class="text-indigo-700 hover:underline">
                            {{ $perf->username }}
                        </a>
                    </div>
                </div>
            @empty
                <span class="text-gray-500">No performers yet.</span>
            @endforelse
        </div>
    </div>

    <div class="flex gap-8 mb-6 items-center">
        <a href="{{ route('dashboard') }}" class="text-indigo-700 hover:underline">Back to Dashboard</a>
        <a href="{{ route('events.index') }}" class="text-indigo-700 hover:underline">Back to All Events</a>
        @auth
            @php
                $user = Auth::user();
            @endphp

            {{-- Organizer can Edit --}}
            @if($user->role === 'organizer' && $user->id === $event->organizer_id)
                <a href="{{ route('events.edit', $event->id) }}" class="btn btn-sm bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 ml-4">Edit Event</a>
            @endif

            {{-- Organizer or Admin can Delete --}}
            @if(
                ($user->role === 'organizer' && $user->id === $event->organizer_id)
                || $user->role === 'admin'
            )
                <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="inline ml-2" onsubmit="return confirm('Are you sure you want to delete this event?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Delete Event</button>
                </form>
            @endif
        @endauth
    </div>
</div>
@endsection
