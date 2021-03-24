<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Room;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth')->except(['show', 'search']);
    }

    public function create()
    {
        $facilities = Facility::get();
        return view('rooms.new', ['facilities' => $facilities]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'address' => 'required|min:10',
            'price' => 'required|numeric|between:0.99,500.00',
            'qty' => 'required|integer',
            'guest' => 'required|integer',
            'image' => 'required',
            'image.*' => 'image|mimes:jpg,png,jpeg,svg,webp|max:2048',
        ]);

        $request->user()->rooms()->create([
            'title' => $request->title,
            'description' => $request->description,
            'address' => $request->address,
            'price' => $request->price,
            'qty' => $request->qty,
            'guest' => $request->guest,
        ]);

        // get image name with url
        if ($request->file('image')) {
            //throw into an array
            foreach ($request->image as $image) {
                $imageName = $image->getClientOriginalName() . time() . rand(1, 10000);
                $path = $image->move(public_path('img/room'), $imageName);
                $img_arr[] = $imageName;
            }
        }

        //find newly created room id and model
        $latest_id = Room::max('id');
        $recently_added_model = Room::find($latest_id);

        //save many image
        foreach ($img_arr as $item) {
            $recently_added_model->images()->create([
                'link' => $item,
            ]);
        }

        //associating id with facility
        if (!empty($request->facility)) {
            foreach ($request->facility as $item) {
                $recently_added_model->facilities()->syncWithoutDetaching([intval($item)]);
            }
        }

        return redirect('/')->with('success', 'Room create successfully');
    }

    public function show(Room $room)
    {
        if (Room::findOrFail($room->id)) {
            $result = $room::with('Images', 'Facilities', 'Reviews', 'user')->where('id', $room->id)->get();
            $comment_user = User::join('reviews', 'users.id', 'user_id')->where('reviews.room_id', $room->id)->select('users.id', 'users.username', 'users.profile')->get();
            $wishlist = Wishlist::join('users', 'user_id', 'users.id')->join('rooms', 'room_id', 'rooms.id')->where('wishlists.user_id', auth()->id())->where('wishlists.room_id', $room->id)->select('wishlists.id', 'wishlists.user_id', 'wishlists.room_id')->get();
            return view('rooms.show', ['room' => $result, 'comment_user' => $comment_user, 'wishlist' => $wishlist]);
        }
    }

    public function search(Request $request)
    {
        $location = $request->location;
        $guest = $request->guest;
        if (empty($location)) {
            $location = " ";
        }
        $result = Room::with('Images', 'Wishlists')->where('address', 'like', "%{$location}%")->where('guest', '>=', "{$guest}")->orderBy('guest')->paginate(20);
        $result->appends(['location' => $location, 'guest' => $guest]);
        return view('rooms.index', ['rooms' => $result, 'guest' => $guest]);
    }

    public function destroy(Room $room)
    {
        $room::findOrFail($room->id);
        if ($room->owndedBy(auth()->user())) {
            $room->delete();

            return redirect('/')->with('success', 'Room delete successfully');
        }
    }

    public function edit(Room $room)
    {
        $room::findOrFail($room->id);
    }

    public function update(Room $room, Request $request)
    {
        $room::findOrFail($room->id);
    }

}
