<?php

// app/Http/Controllers/ReviewController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $id)
    {
        // $id is the profile owner's user id (the one being reviewed)
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $userId = (int) $id;
        $reviewerId = Auth::id();

        // Prevent double-review (optional)
        $existing = Review::where('user_id', $userId)->where('reviewer_id', $reviewerId)->first();
        if ($existing) {
            return back()->with('error', 'You have already reviewed this user.');
        }

        Review::create([
            'user_id' => $userId,
            'reviewer_id' => $reviewerId,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Review submitted!');
    }
}
