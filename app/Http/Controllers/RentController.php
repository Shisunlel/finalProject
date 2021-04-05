<?php

namespace App\Http\Controllers;

use App\Models\DetailRent;
use App\Models\Rent;

class RentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('checkout.checkout');
    }

    public function storerent()
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
