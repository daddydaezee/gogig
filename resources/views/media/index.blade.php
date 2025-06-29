@extends('layouts.app')
@section('title', 'My Media')
@section('content')
<div class="max-w-4xl mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-4">Portfolio Media</h2>
    <form method="POST" action="{{ route('media.store') }}" enctype="multipart/form-data" class="mb-8 bg-white p-4 rounded shadow">
        @csrf
        <div class="flex items-center gap-4 mb-2">
            <input type="file" name="file" class="border rounded p-2" required>
            <input type="text" name="caption" placeholder="Caption" class="border rounded p-2 flex-1">
            <select name="type" class="border rounded p-2">
                <option value="">Type (auto)</option>
                <option value="image">Image</option>
                <option value="video">Video</option>
            </select>
            <button type="submit" class="btn btn-primary">Upload</button>
        </div>
    </form>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @foreach($media as $m)
            <div class="bg-white rounded shadow p-2 flex flex-col items-center">
                @if(str_starts_with($m->type, 'video'))
                    <video src="{{ asset('storage/' . $m->file_path) }}" class="w-full h-32 rounded" controls></video>
                @else
                    <img src="{{ asset('storage/' . $m->file_path) }}" class="w-full h-32 object-cover rounded" />
                @endif
                <div class="mt-2 text-sm">{{ $m->caption }}</div>
                <form method="POST" action="{{ route('media.destroy', $m->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-xs mt-2">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection
