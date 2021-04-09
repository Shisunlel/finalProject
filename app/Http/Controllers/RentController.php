<?php

namespace App\Http\Controllers;

use App\Models\DetailRent;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request as Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class RentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Room $room, Request $request)
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

    public function store(Room $room, Request $request)
    {
        $year = Carbon::now()->format('y');
        $validator = FacadesValidator::make($request->all(), [
            'dob' => 'required|date|before:-17 years',
            'start' => 'required|date|before:end',
            'end' => 'required|date|after:start',
            'cost' => 'required|numeric|min:1',
            'duration' => 'required|numeric|min:1',
            'total' => 'required|numeric|min:0.01',
            'guest' => 'required|numeric|min:1',
            'housenumber' => 'sometimes|required_with:address,commune,district,province|string',
            'address' => 'sometimes|required_with:housenumber,commune,district,province|string',
            'commune' => 'sometimes|required_with:housenumber,address,district,province|string',
            'district' => 'sometimes|required_with:housenumber,address,commune,province|string',
            'province' => 'sometimes|required_with:housenumber,address,commune,district|string',
            'phone' => 'sometimes|required|numeric|unique:App\Models\User,phone_number|starts_with:0|digits_between:9,10',
            'profile' => 'sometimes|required|image|mimes:jpg,png,jpeg,svg,webp|max:2048|dimensions:min_width=500,min_height=500',
            'card-name' => 'required|regex:/^[a-zA-Z_ ]*$/',
            'card-number' => 'required|numeric|digits:16',
            'card-expire-month' => 'required|numeric|digits:2|min:01|max:12',
            'card-expire-year' => 'required|numeric|digits:2|min:' . $year,
            'cvv' => 'required|numeric|digits:3',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $rent = $request->user()->rents()->create();
            $detail = new DetailRent;
            $detail->rent_id = $rent->id;
            $detail->room_id = $room->id;
            $detail->duration = $request->duration;
            $detail->cost = $request->cost;
            $detail->total = $request->total;
            $request->housenumber ? $detail->housenumber = $request->housenumber : $detail->housenumber = auth()->user()->housenumber;
            $request->street ? $detail->street = $request->street : $detail->street = auth()->user()->street;
            $request->district ? $detail->district = $request->district : $detail->district = auth()->user()->district;
            $request->commune ? $detail->commune = $request->commune : $detail->commune = auth()->user()->commune;
            $request->province ? $detail->province = $request->province : $detail->province = auth()->user()->province;
        }

        if ($detail->save()) {
            return redirect()->route('history')->with("success", "Checkout Completed");
        } else {
            return back()->with('error', 'Unexpected error!');
        }
    }
}
