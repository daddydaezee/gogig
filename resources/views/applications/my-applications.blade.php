@extends('layouts.app')
@section('title', 'My Event Applications')
@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-4">My Event Applications</h2>
    <div class="bg-white rounded shadow">
        @forelse($applications as $app)
            <div class="flex items-center justify-between border-b px-4 py-3">
                <div>
                    <div class="font-semibold">{{ $app->event->name }}</div>
                    <div class="text-xs text-gray-500">Organizer: {{ $app->event->organizer->username }}</div>
                    <div class="text-xs text-gray-500">Date: {{ $app->event->start_date }}</div>
                </div>
                <div>
                    <span class="capitalize font-bold text-xs
                        @if($app->status == 'approved') text-green-700
                        @elseif($app->status == 'rejected') text-red-700
                        @else text-gray-700 @endif">
                        {{ $app->status }}
                    </span>
                </div>
            </div>
        @empty
            <div class="py-8 text-center text-gray-500">You have not applied to any events yet.</div>
        @endforelse
    </div>
</div>
@endsection
