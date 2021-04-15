<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\DetailRent;
use App\Models\Rent;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $transc = Rent::select(DB::raw('month(created_at) as orr, monthname(created_at) as month, count(created_at) as record_count'))->groupBy(DB::raw('month(created_at)'))->orderBy('orr')->get();
        $user = User::select(DB::raw('month(created_at) as orr, monthname(created_at) as month, count(created_at) as user_count'))->groupBy(DB::raw('month(created_at)'))->orderBy('orr')->get();
        $room = Room::select(DB::raw('month(created_at) as orr, monthname(created_at) as month, count(created_at) as room_count'))->groupBy(DB::raw('month(created_at)'))->orderBy('orr')->get();
        return view('auth.admin.dashboard')->with(['users' => $user, 'transcs' => $transc, 'rooms' => $room]);
    }

    public function user()
    {
        $user = User::get();
        return view('auth.admin.user')->with('users', $user);
    }

    public function room()
    {
        $room = Room::get();
        return view('auth.admin.room')->with('rooms', $room);
    }

    public function transc()
    {
        $transc = DetailRent::get();
        return view('auth.admin.transaction')->with('transcs', $transc);
    }
}
