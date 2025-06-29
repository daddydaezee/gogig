@extends('layouts.app')
@section('title', 'Applications for ' . $event->name)
@section('content')
<div class="max-w-3xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-4">Applications for "{{ $event->name }}"</h2>
    <div class="bg-white rounded shadow">
        @forelse($applications as $app)
            <div class="flex items-center justify-between border-b p-4">
                <div class="flex items-center gap-4">
                    @if($app->user->profile && $app->user->profile->photo)
                        <img src="{{ asset('storage/'.$app->user->profile->photo) }}" class="h-12 w-12 rounded-full object-cover" />
                    @endif
                    <div>
                        <div class="font-semibold">{{ $app->user->username }}</div>
                        <div class="text-gray-500 text-xs">{{ $app->user->email }}</div>
                        <div class="text-sm text-gray-600 mt-1">{{ $app->message ?? '-' }}</div>
                    </div>
                </div>
                <div>
                    <span class="capitalize font-semibold text-xs {{ $app->status === 'approved' ? 'text-green-700' : ($app->status === 'rejected' ? 'text-red-700' : 'text-gray-700') }}">
                        {{ $app->status }}
                    </span>
                    @if($app->status === 'pending')
                    <form method="POST" action="{{ route('applications.approve', $app->id) }}" class="inline">
                        @csrf
                        <button class="btn btn-success btn-xs mx-1">Approve</button>
                    </form>
                    <form method="POST" action="{{ route('applications.reject', $app->id) }}" class="inline">
                        @csrf
                        <button class="btn btn-danger btn-xs">Reject</button>
                    </form>
                    @endif
                </div>
            </div>
        @empty
            <div class="text-center py-8 text-gray-500">No applications yet.</div>
        @endforelse
    </div>
    <a href="{{ route('dashboard') }}" class="mt-4 inline-block text-indigo-700 hover:underline">Back to Dashboard</a>
</div>
@endsection
