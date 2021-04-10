<?php

namespace App\Http\Controllers;

use App\Models\DetailRent;

class RentDetailController extends Controller
{
    public function history()
    {
        $detail = DetailRent::join('rents', 'rent_id', '=', 'id')->join('rooms', 'room_id', 'rooms.id')->where('rents.user_id', auth()->id())->select('title', 'description', 'duration', 'cost', 'total', 'rents.created_at')->get();
        return view('auth.history')->with('detail', $detail);
    }
}
