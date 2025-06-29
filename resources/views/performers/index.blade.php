@extends('layouts.app')
@section('title', 'Performer Directory')
@section('content')
<div class="max-w-5xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-4">Performer Directory</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($performers as $perf)
            <div class="bg-white rounded shadow p-4 flex flex-col items-center">
                @if($perf->profile && $perf->profile->photo)
                    <img src="{{ asset('storage/' . $perf->profile->photo) }}" class="h-24 w-24 rounded-full mb-2 object-cover">
                @endif
                <div class="font-bold text-lg">{{ $perf->username }}</div>
                <div class="text-sm text-gray-500">{{ $perf->profile->bio ?? '' }}</div>
                <a href="#" class="btn btn-outline btn-xs mt-2">View Profile</a>
            </div>
        @empty
            <div class="col-span-3 text-gray-500">No performers found.</div>
        @endforelse
    </div>
</div>
@endsection
