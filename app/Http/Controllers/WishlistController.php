<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $saved = Wishlist::where('user_id', auth()->user()->id)->paginate(12);

        $a = array();
        for ($i = 0; $i < count($saved); $i++) {
            $a[$i] = $saved[$i]->room_id;
        }

        $room = Room::with('Images')->whereIn('rooms.id', $a)->get();
        return view('saved', ['wishlist' => $saved, 'room' => $room]);
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
