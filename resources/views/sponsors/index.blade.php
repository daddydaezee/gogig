@extends('layouts.app')
@section('title', 'Sponsor Directory')
@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-4">Sponsor Directory</h2>
    <div class="bg-white rounded shadow">
        @forelse($sponsors as $sponsor)
            <div class="flex items-center justify-between border-b px-4 py-3">
                <div>
                    <div class="font-semibold">{{ $sponsor->name }}</div>
                    <div class="text-xs text-gray-500">Type: {{ $sponsor->type }}</div>
                    <div class="text-xs text-gray-500">Contact: {{ $sponsor->email ?? $sponsor->phone ?? '-' }}</div>
                </div>
                <div class="font-bold text-indigo-700">RM {{ number_format($sponsor->amount, 2) }}</div>
            </div>
        @empty
            <div class="py-8 text-center text-gray-500">No sponsors found.</div>
        @endforelse
    </div>
</div>
@endsection
