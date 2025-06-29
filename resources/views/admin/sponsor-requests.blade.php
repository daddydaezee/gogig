@extends('layouts.app')
@section('title', 'Sponsor Requests Approval')
@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-4">Sponsor Requests Approval</h2>
    <div class="bg-white rounded shadow">
        @forelse($requests as $req)
            <div class="flex items-center justify-between border-b px-4 py-3">
                <div>
                    <div><strong>Event:</strong> {{ $req->event->name ?? '-' }} by {{ $req->event->organizer->username ?? '-' }}</div>
                    <div><strong>Sponsor:</strong> {{ $req->sponsor->name ?? '-' }} ({{ $req->sponsor->type ?? '-' }})</div>
                    <div><strong>Amount:</strong> {{ $req->sponsor->amount ?? '-' }}</div>
                    <div class="text-xs text-gray-500">Requested at: {{ $req->created_at }}</div>
                    <div class="text-sm mt-1"><strong>Message:</strong> {{ $req->message ?? '-' }}</div>
                </div>
                <div>
                    <span class="capitalize font-bold {{ $req->status == 'approved' ? 'text-green-700' : ($req->status == 'rejected' ? 'text-red-700' : 'text-gray-700') }}">
                        {{ $req->status }}
                    </span>
                    @if($req->status == 'pending')
                        <form method="POST" action="{{ route('admin.sponsor-approve', $req->id) }}" class="inline">@csrf
                            <button class="btn btn-success btn-xs mx-1">Approve</button>
                        </form>
                        <form method="POST" action="{{ route('admin.sponsor-reject', $req->id) }}" class="inline">@csrf
                            <button class="btn btn-danger btn-xs">Reject</button>
                        </form>
                    @endif
                </div>
            </div>
        @empty
            <div class="py-8 text-center text-gray-500">No sponsor requests pending approval.</div>
        @endforelse
    </div>
</div>
@endsection
