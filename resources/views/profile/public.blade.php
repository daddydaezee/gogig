@extends('layouts.app')
@section('title', $user->username . '\'s Profile')
@section('content')
<div class="max-w-xl mx-auto bg-white rounded shadow p-8 mt-8">
    <h2 class="text-2xl font-bold mb-4">{{ $user->username }}'s Profile</h2>
    <div class="flex items-center mb-4">
        @if($profile && $profile->photo)
            <img src="{{ asset('storage/'.$profile->photo) }}" class="h-20 w-20 object-cover rounded-full mr-4" />
        @endif
        <div>
            <div class="font-semibold text-lg">{{ $user->username }}</div>
            <div class="text-sm text-gray-500">Role: {{ ucfirst($user->role) }}</div>
            <div class="text-xs text-gray-500">Joined: {{ $user->created_at->format('Y-m-d') }}</div>
        </div>
    </div>
    <div class="mb-4"><strong>Bio:</strong><br>{{ $profile->bio ?? '-' }}</div>
    <div class="mb-4"><strong>Social Links:</strong>
        <ul>
            <li>Instagram: {{ $profile->social_ig ?? '-' }}</li>
            <li>Facebook: {{ $profile->social_fb ?? '-' }}</li>
            <li>X (Twitter): {{ $profile->social_x ?? '-' }}</li>
        </ul>
    </div>
    <div class="mb-4"><strong>Portfolio:</strong>
        <div class="flex flex-wrap gap-2 mt-2">
            @foreach($user->media as $media)
                @if(str_starts_with($media->type, 'video'))
                    <video src="{{ asset('storage/' . $media->file_path) }}" class="h-20 rounded" controls></video>
                @else
                    <img src="{{ asset('storage/' . $media->file_path) }}" class="h-20 w-20 object-cover rounded" />
                @endif
            @endforeach
        </div>
    </div>
    <div class="mb-4">
        <strong>Reviews:</strong>
        @foreach($user->reviews as $review)
            <div class="border-t pt-2 mt-2">
                <span class="text-yellow-500">{{ str_repeat('★', $review->rating) }}{{ str_repeat('☆', 5-$review->rating) }}</span>
                <span class="ml-2 text-gray-700">{{ $review->comment }}</span>
                <div class="text-xs text-gray-500">From event: {{ $review->event->name ?? '-' }}</div>
            </div>
        @endforeach
    </div>
</div>
@endsection
