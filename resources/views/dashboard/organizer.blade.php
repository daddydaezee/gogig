@extends('layouts.app')
@section('title', 'Organizer Dashboard')
@section('content')
<div class="max-w-6xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Hi, {{ $user->username }}</h1>
    <section class="mb-8">
        <h2 class="font-bold text-lg mb-2">Your Events</h2>
        <div class="flex flex-wrap gap-6">
            @foreach($myEvents as $event)
                <div class="w-100 bg-white rounded shadow p-2">
                    <img src="{{ asset($event->poster ? 'storage/'.$event->poster : 'images/event-placeholder.png') }}" class="w-45 h-32 object-cover rounded mb-2" />
                    <div class="font-semibold">{{ $event->name }}</div>
                    <div class="text-sm text-gray-500">{{ $event->location }} | {{ $event->start_date }}</div>
                    <a href="{{ route('events.show', $event->id) }}" class="btn btn-sm mt-2">View</a>
                    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-sm btn-outline mt-2">Edit</a>
                    <a href="{{ route('applications.list', $event->id) }}" class="btn btn-sm btn-outline mt-2">Applications</a>
                </div>
            @endforeach
            <a href="{{ route('events.create') }}" class="w-60 flex flex-col items-center justify-center border-2 border-dashed border-indigo-400 rounded p-8 text-indigo-700 hover:bg-indigo-50 transition-all">
                <span class="text-5xl mb-2">+</span>
                <span class="font-bold">Add New Event</span>
            </a>
        </div>
    </section><br>
    <section>
    <h2 class="font-bold text-lg mb-2">Performer Applications</h2>
    <div class="w-75 bg-white rounded shadow">
        @forelse($myApplications as $app)
            <div class="flex justify-between items-center border-b px-4 py-2">
                <div>
                    <img src="{{ asset($app->event && $app->event->poster ? 'storage/'.$app->event->poster : 'images/event-placeholder.png') }}" class="w-45 h-32 object-cover rounded mb-2" />

                    <div class="font-bold">Event: {{ $app->event->name ?? '-' }}</div>
                    <div class="font-bold text-xs text-gray-700">
                        Performer: {{ $app->user->username ?? '-' }}
                        @if($app->user->profile && $app->user->profile->photo)
                            <img src="{{ asset('storage/'.$app->user->profile->photo) }}" class="inline h-6 w-6 rounded-full ml-1" />
                        @endif
                    </div>
                    <div>
                        Status:
                        <span class="font-bold capitalize 
                            {{ $app->status == 'approved' ? 'text-green-600' : 
                               ($app->status == 'rejected' ? 'text-red-600' : 'text-gray-700') }}">
                            {{ $app->status }}
                        </span>
                    </div>
                </div>
                <div>
                    @if($app->status == 'pending')
                        <form method="POST" action="{{ route('applications.approve', $app) }}" class="inline">@csrf
                            <button
                                type="submit"
                                class="bg-green-600 hover:bg-green-700 text-white py-1 px-3 rounded font-semibold mr-2"
                            >
                                Approve
                            </button>
                        </form>
                        <form method="POST" action="{{ route('applications.reject', $app) }}" class="inline">@csrf
                            <button
                                type="submit"
                                class="bg-red-600 hover:bg-red-700 text-white py-1 px-3 rounded font-semibold"
                            >
                                Reject
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        @empty
            <div class="px-4 py-8 text-gray-400 text-center">No performer applications yet.</div>
        @endforelse
    </div>
</section>


</div>
@endsection
