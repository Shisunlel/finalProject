<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class SearchController extends Controller
{
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
