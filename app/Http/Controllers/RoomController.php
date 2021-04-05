<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Room;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth')->except(['show', 'search']);
    }

    public function saveImage($image)
    {
        $imageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $imageNamee = $imageName . time() . rand(1, 10000) . '.' . $image->getClientOriginalExtension();
        $path = $image->move(public_path('img/room'), $imageNamee);
        return $imageNamee;
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
                $img_arr[] = $this->saveImage($image);
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

    public function edit(Room $room)
    {
        $room::findOrFail($room->id);
        $facilities = Facility::get();
        return view('rooms.edit')->with(['room' => $room, 'facilities' => $facilities]);
    }

    public function update(Room $room, Request $request)
    {
        $room::findOrFail($room->id);
        $this->validate($request, [
            'title' => 'sometimes|required|min:5',
            'description' => 'sometimes|required|min:10',
            'address' => 'sometimes|required|min:10',
            'price' => 'sometimes|required|numeric|between:0.99,500.00',
            'qty' => 'sometimes|required|integer',
            'guest' => 'sometimes|required|integer',
            'image' => 'sometimes|required',
            'image.*' => 'image|mimes:jpg,png,jpeg,svg,webp|max:2048',
        ]);

        $request->title && $room->title = $request->title;
        $request->description && $room->description = $request->description;
        $request->address && $room->address = $request->address;
        $request->price && $room->price = $request->price;
        $request->qty && $room->qty = $request->qty;
        $request->guest && $room->guest = $request->guest;

        // get image name with url
        if ($request->hasFile('image')) {
            //throw into an array
            foreach ($request->image as $image) {
                $img_arr[] = $this->saveImage($image);
            }

            // remove old image
            foreach ($room->images as $item) {
                Storage::disk('public')->delete("img/room/{$item->link}");
            }

            //save many image
            foreach ($img_arr as $item) {
                $room->images[0]->link = $item;
            }
        }

        //associating id with facility
        $facility = array();
        if (!empty($request->facility)) {
            foreach ($request->facility as $item) {
                $facility[] = intval($item);
            }
            $room->facilities()->sync($facility);
        }

        if ($room->push()) {
            return redirect()->route('view-home');
        }
    }

    public function destroy(Room $room)
    {
        $room::findOrFail($room->id);
        if ($room->ownedBy(auth()->user())) {
            $room->delete();
            return redirect('/')->with('success', 'Room delete successfully');
        }
    }

}
