<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;

class MediaController extends Controller
{
    // Only performer can access media
    public function index()
    {
        if (auth()->user()->role !== 'performer') {
            abort(403, 'Performers only!');
        }
        $media = auth()->user()->media;
        return view('media.index', compact('media'));
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'performer') {
            abort(403, 'Performers only!');
        }
        $request->validate([
            'file' => 'required|mimes:jpg,png,mp4|max:10240'
        ]);

        $filePath = $request->file('file')->store('media', 'public');
        $media = new Media();
        $media->user_id = auth()->id();
        $media->path = $filePath;
        $media->type = $request->file('file')->getClientMimeType();
        $media->save();

        return back()->with('success', 'Media uploaded!');
    }

    public function destroy(Media $media)
    {
        if (auth()->user()->role !== 'performer' || $media->user_id !== auth()->id()) {
            abort(403, 'Unauthorized.');
        }
        $media->delete();
        return back()->with('success', 'Media deleted!');
    }
}
