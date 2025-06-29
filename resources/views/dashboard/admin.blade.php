@extends('layouts.app')
@section('title', 'Admin Dashboard')
@section('content')
<div class="max-w-6xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-4">Hi, Admin</h2>
    {{-- Admin Analytics Widget --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="bg-white rounded shadow p-6 text-center">
            <div class="text-4xl font-bold text-indigo-700">{{ $totalUsers ?? 0 }}</div>
            <div class="text-gray-600 mt-2">Total Users</div>
        </div>
        <div class="bg-white rounded shadow p-6 text-center">
            <div class="text-4xl font-bold text-indigo-700">{{ $totalEvents ?? 0 }}</div>
            <div class="text-gray-600 mt-2">Total Events</div>
        </div>
        <div class="bg-white rounded shadow p-6 text-center">
            <div class="text-4xl font-bold text-yellow-500">{{ $approvalsPending ?? 0 }}</div>
            <div class="text-gray-600 mt-2">Approvals Pending</div>
        </div>
    </div>

    <section class="mb-8">
        <h3 class="font-bold text-lg mb-2">Event Published</h3>
        <div class="flex flex-wrap gap-6">
            @forelse($events->take(3) as $event)
                <div class="w-80 bg-white rounded shadow p-2">
                    <img src="{{ asset($event->poster ? 'storage/'.$event->poster : 'images/event-placeholder.png') }}" class="w-full h-32 object-cover rounded mb-4" />
                    <div class="font-semibold">{{ $event->name }}</div>
                    <div class="text-sm text-gray-500">{{ $event->location }} | {{ $event->start_date }}</div>
                    <a href="{{ route('events.show', $event->id) }}" class="btn btn-sm mt-4">View</a>
                </div>
            @empty
                <div class="text-gray-400 text-center w-full">No events found.</div>
            @endforelse
        </div>
        @if($events->count() > 3)
            <div class="mt-4">
                <a href="{{ route('events.index') }}" class="btn btn-outline-primary">See More>></a>
            </div>
        @endif
    </section>

    <section>
        <h3 class="font-bold text-lg mb-2">Sponsor Request Approval</h3>
        <div class="bg-white rounded shadow">
            @foreach($pendingSponsorRequests as $req)
                <div class="flex justify-between items-center border-b px-4 py-2">
                    <div>
                        <div>Event: {{ $req->event->name }} ({{ $req->event->organizer->username }})</div>
                        <div class="text-xs text-gray-500">Sponsor: {{ $req->sponsor->name ?? '-' }} | {{ $req->sponsor->type ?? '-' }} | Amount: {{ $req->sponsor->amount ?? '-' }}</div>
                    </div>
                    <div>
                        <form action="{{ route('admin.sponsor-approve', $req->id) }}" method="POST" class="inline">@csrf
                            <button class="btn btn-success">Approve</button>
                        </form>
                        <form action="{{ route('admin.sponsor-reject', $req->id) }}" method="POST" class="inline">@csrf
                            <button class="btn btn-danger">Reject</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>
@endsection
