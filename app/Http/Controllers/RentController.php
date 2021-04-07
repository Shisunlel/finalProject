<?php

namespace App\Http\Controllers;

use App\Models\DetailRent;
use App\Models\Rent;
use App\Models\Room;
use Illuminate\Http\Request as HttpRequest;

class RentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Room $room, HttpRequest $request)
    {
        $this->validate($request, [
            'start' => 'required|date|before:end',
            'end' => 'required|date|after:start',
            'cost' => 'required|numeric|min:1',
            'duration' => 'required|numeric|min:1',
        ]);
        $request->service = 3.00;
        return view('rooms.checkout.checkout')->with(['room' => $room, 'request' => $request]);
    }

    public function store()
    {
        $rent = Rent::create([
            'user_id' => auth()->user()->id,
        ]);

        DetailRent::create([
            'duration' => '69',
            'room_id' => '24',
            'rent_id' => $rent->id,
        ]);

        return redirect()->intended('/')->with("success", "Checkout Completed");
    }
}
