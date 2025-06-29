@extends('layouts.app')
@section('title', 'Past Events Archive')
@section('content')
<div class="max-w-5xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-4">Past Events</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($pastEvents as $event)
            <div class="bg-white rounded shadow p-4">
                <img src="{{ asset($event->poster ? 'storage/'.$event->poster : 'images/event-placeholder.png') }}" class="w-full h-32 object-cover rounded mb-2">
                <div class="font-bold text-lg">{{ $event->name }}</div>
                <div class="text-xs text-gray-500 mb-1">{{ $event->location }}</div>
                <div class="text-sm text-gray-700 mb-2">{{ $event->start_date }} - {{ $event->end_date }}</div>
                <div>
                    <span class="text-xs">Reviews:</span>
                    <span class="text-yellow-500 font-bold">{{ $event->reviews->avg('rating') ? number_format($event->reviews->avg('rating'), 1) : '-' }}/5</span>
                    <span class="text-xs ml-2">{{ $event->reviews->count() }} total</span>
                </div>
                <a href="{{ route('events.show', $event->id) }}" class="btn btn-outline btn-xs mt-2">Details</a>
            </div>
        @empty
            <div class="col-span-3 text-gray-500">No past events.</div>
        @endforelse
    </div>
</div>
@endsection
