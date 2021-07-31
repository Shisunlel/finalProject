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
        $transc = DetailRent::select(DB::raw('total, month(created_at) as orr, monthname(created_at) as month'))->where('created_at', '!=', null)->groupBy(DB::raw('month(created_at)'))->orderBy('orr')->get();
        $user = User::select(DB::raw('month(created_at) as orr, monthname(created_at) as month, count(created_at) as user_count'))->groupBy(DB::raw('month(created_at)'))->orderBy('orr')->get();
        $room = Room::select(DB::raw('month(created_at) as orr, monthname(created_at) as month, count(created_at) as room_count'))->groupBy(DB::raw('month(created_at)'))->orderBy('orr')->get();
        return view('auth.admin.dashboard')->with(['users' => $user, 'transcs' => $transc, 'rooms' => $room]);
    }

    public function user()
    {
        $user = User::paginate(20);
        return view('auth.admin.user')->with('users', $user);
    }

    public function userdestroy(User $user)
    {
        $user::findOrFail($user->id);

        if ($user->delete()) {
            $this->removeDir($user->id);
            return back();
        }

        abort(409);

    }

    public function room()
    {
        $room = Room::paginate(20);
        return view('auth.admin.room')->with('rooms', $room);
    }

    public function roomdestroy(Room $room)
    {
        $room::findOrFail($room->id);

        if ($room->delete()) {
            $this->removeDir('', $room->id);
            return back();
        }

        abort(409);

    }

    public function transc()
    {
        $transc = DetailRent::paginate(20);
        return view('auth.admin.transaction')->with('transcs', $transc);
    }

    public function reportdestroy($id)
    {
        $rent = Rent::findOrFail($id);

        if ($rent->delete()) {
            return back();
        }

        abort(409);

    }
}
