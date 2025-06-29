@extends('layouts.app')
@section('title', 'Organizers List')
@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-4">All Organizers</h2>
    <div class="bg-white rounded shadow">
        @forelse($organizers as $org)
            <div class="flex items-center justify-between border-b px-4 py-3">
                <div>
                    <div class="font-semibold">{{ $org->username }}</div>
                    <div class="text-xs text-gray-500">{{ $org->email }}</div>
                    <div class="text-xs text-gray-500">Joined: {{ $org->created_at->format('Y-m-d') }}</div>
                </div>
                <div>
                    @if(is_null($org->email_verified_at))
                        <form method="POST" action="{{ route('admin.approve', $org->id) }}" class="inline">@csrf
                            <button class="btn btn-success btn-xs mx-1">Approve</button>
                        </form>
                        <form method="POST" action="{{ route('admin.reject', $org->id) }}" class="inline">@csrf
                            <button class="btn btn-danger btn-xs">Reject</button>
                        </form>
                    @else
                        <span class="text-green-700 font-bold">Approved</span>
                    @endif
                </div>
            </div>
        @empty
            <div class="py-8 text-center text-gray-500">No organizers found.</div>
        @endforelse
    </div>
</div>
@endsection
