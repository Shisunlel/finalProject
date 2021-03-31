<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Room;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Room $room, Request $request)
    {
        $this->validate($request, [
            'rating' => 'required',
            'review' => 'required',
        ]);

        $room->reviews()->create([
            'review_detail' => $request->review,
            'rating' => (float) $request->rating,
            'user_id' => $request->user()->id,
        ]);

        return back();
    }

    public function destroy(Review $review)
    {
        if ($review->reviewedBy(auth()->user())) {
            $review->delete();
        }

        return back()->with('success', 'Successfully deleted');
    }
}
