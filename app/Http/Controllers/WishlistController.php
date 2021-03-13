<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Room $room, Request $request)
    {
        if ($room->savedBy(auth()->user())) {
            return response(null, 403);
        }

        if ($request->user()->wishlists()->create([
            'room_id' => $room->id,
        ])) {
            return redirect()->back();
        }
    }

    public function destroy(Room $room, Request $request)
    {
        $request->user()->wishlists()->where('room_id', $room->id)->delete();
        return back();
    }

}
