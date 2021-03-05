<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;


class AddroomController extends Controller
{
    public function index()
    {
        return view('admin.formroom');
    }

    public function addrooms(HttpRequest $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'address' => 'required|min:10',
            'price' => 'required|max:3',
            'qty' => 'required',
            'guest' => 'required',
            'image' => 'required',
        ]);        
            if($request->has('available'))
            {
                $available = 1;
            }else{
                $available = 0;
            }
        Room::create([
            'title' => $request->title,
            'description' => $request->description,
            'address' => $request->address,
            'price' => $request->price,
            'qty' => $request->qty,
            'guest' => $request->guest,
            'available' => $available,
            'user_id' => '1',
            
        ]);

        return back();
    }
    
}
