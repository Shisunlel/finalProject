<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $location = $request->location;
        $guest = $request->guest;
        if (empty($location)) {
            $location = " ";
        }
        $result = Room::with('Images')->where('address', 'like', "%{$location}%")->where('guest', '>=', "{$guest}")->orderBy('guest')->paginate(20);
        $result->appends(['location' => $location, 'guest' => $guest]);
        return view('rooms.index', ['rooms' => $result, 'guest' => $guest]);
    }
}
