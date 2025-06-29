@extends('layouts.app')
@section('title', $user->username)
@section('content')
<div class="max-w-3xl mx-auto py-8">
    <div class="bg-white rounded shadow-lg p-8 flex flex-col md:flex-row items-center mb-8">
        <div class="w-36 h-36 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden mb-4 md:mb-0 md:mr-8">
            @if($profile && $profile->photo)
                <img src="{{ asset('storage/'.$profile->photo) }}" class="object-cover w-full h-full">
            @else
                <span class="text-5xl text-gray-400">?</span>
            @endif
        </div>
        <div class="flex-1">
            <div class="flex items-center">
                <h2 class="text-3xl font-bold mr-2">{{ $user->username }}</h2>
                <span class="text-gray-600 capitalize">{{ ucfirst($user->role) }}</span>
            </div>
            <div class="mt-2">
                <div><b>Phone:</b> {{ $profile->phone ?? '-' }}</div>
                <div><b>Address:</b> {{ $profile->address ?? '-' }}</div>
                <div><b>Contact Email:</b> {{ $profile->contact_email ?? '-' }}</div>
            </div>
            <div class="mt-2"><b>Social Media</b></div>
            <div>
                @if(!empty($profile->instagram))
                    <span>Instagram: {{ $profile->instagram }}</span>
                @endif
                @if(!empty($profile->facebook))
                    <span class="ml-3">Facebook: {{ $profile->facebook }}</span>
                @endif
                @if(!empty($profile->x))
                    <span class="ml-3">X: {{ $profile->x }}</span>
                @endif
            </div>
            @if((!isset($public) || !$public) && Auth::id() === $user->id)
                <a href="{{ route('profile.edit') }}" class="btn btn-primary mt-4">Edit Profile</a>
            @endif
        </div>
    </div>

    {{-- Only show these for non-admins --}}
    @if($user->role !== 'admin')
        <div class="mb-8">
            <h3 class="font-bold text-xl mb-2">Media Portfolio</h3>
            @if($media && count($media))
                <div class="flex flex-wrap gap-4">
                    @foreach($media as $m)
                        <div>
                            @if(Str::endsWith($m->file, ['.jpg','.jpeg','.png','.gif']))
                                <img src="{{ asset('storage/'.$m->file) }}" class="w-32 h-32 object-cover rounded mb-1" />
                            @else
                                <a href="{{ asset('storage/'.$m->file) }}" target="_blank">{{ $m->file }}</a>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-gray-500">No media uploaded yet.</div>
            @endif
        </div>

        <div class="mb-8">
            <h3 class="font-bold text-xl mb-2">Reviews</h3>
            @if($reviews && count($reviews))
                @foreach($reviews as $review)
                    <div class="border-b py-2">
                        <span class="font-semibold">{{ $review->reviewer->username }}</span>
                        <span class="ml-2 text-yellow-500">
                            {{ str_repeat('★', $review->rating) }}{{ str_repeat('☆', 5-$review->rating) }}
                        </span>
                        <div>{{ $review->comment }}</div>
                    </div>
                @endforeach
            @else
                <div class="text-gray-500">No reviews yet.</div>
            @endif
        </div>
    @endif
</div>
@endsection
