@extends('layouts.app')
@section('title', 'All Upcoming Events')
@section('content')
<div class="max-w-5xl mx-auto py-10">
    <h1 class="text-3xl font-bold mb-6">All Upcoming Events</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-8">
        @forelse($events as $event)
            <div class="bg-white rounded-lg shadow p-2 flex flex-col items-center">
                <img src="{{ $event->poster ? asset('storage/'.$event->poster) : asset('images/event-placeholder.png') }}" class="w-48 h-32 object-cover rounded mb-2" />
                <div class="font-semibold">{{ $event->name }}</div>
                <div class="text-sm text-gray-500">{{ $event->location }}</div>
                <div class="text-xs text-gray-400 mb-1">{{ $event->start_date }}</div>
                <a href="{{ route('events.show', $event) }}" class="btn btn-sm mb-2">View Details</a>

                @auth
                    @if(auth()->user()->role === 'performer')
                        {{-- Optionally: check if already applied --}}
                        @php
                            $alreadyApplied = auth()->user()->applications()->where('event_id', $event->id)->exists();
                        @endphp
                        @if(!$alreadyApplied)
                            <form action="{{ route('events.apply', $event) }}" method="POST">
                                @csrf
                                <button class="btn btn-sm">Apply</button>
                            </form>
                        @else
                            <span class="text-green-600 text-xs font-semibold">Already Applied</span>
                        @endif
                    @endif
                @endauth
            </div>
        @empty
            <div class="col-span-3 text-gray-400 py-8 text-center">No upcoming events available.</div>
        @endforelse
    </div>
</div>
@endsection
