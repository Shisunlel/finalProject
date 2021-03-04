<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    // public function index()
    // {
    //     // $result = Room::find(2)->image();
    //     // $result = Room::join('images', 'rooms.id', '=', 'images.room_id')->select('rooms.id', 'title', 'description', 'address', 'price', 'available', 'room_id', 'link')->get();
    //     // $result = Image::join('rooms', 'images.room_id', '=', 'rooms.id')->get();
    //     $result = DB::select('SELECT rooms.id, title, description, address, price, link, min(room_id) FROM rooms INNER JOIN images ON rooms.id = images.room_id WHERE qty > 0 GROUP BY rooms.id ORDER BY RAND() LIMIT 20');
    //     return view('rooms.index', ['rooms' => $result]);
    // }

    public function search(Request $request)
    {
        $query = $request->q;
        if (empty($query)) {
            $query = "Phnom Penh";
        }
        $result = Room::with('Images')->where('address', 'like', "%{$query}%")->paginate(20);

        $result->appends(['q' => $query]);
        return view('rooms.index', ['rooms' => $result]);

    }
}
