<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Intervention\Image\Facades\Image as Img;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function saveImage($request, $dir, $width, $height)
    {
        $image = $request;
        $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $image->getClientOriginalExtension();
        $imageName = $name . time() . rand(1, 10000) . '.' . $extension;
        $destination = public_path("img/user/" . auth()->id() . "/{$dir}");
        $dir = 'img/user/' . auth()->id() . "/{$dir}";
        if (!Storage::disk('public')->exists($destination)) {
            Storage::disk('public')->makeDirectory($dir);
        }
        $img = Img::make($image->path());
        $img->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destination . '/' . $imageName);
        return $imageName;
    }

    public function index()
    {
        return view('auth.profile');
    }

    public function home()
    {
        $room = Room::with('Images')->where('user_id', auth()->id())->paginate(12);
        return view('auth.room')->with('rooms', $room);
    }

    public function history()
    {

    }

    public function update(HttpRequest $request, User $user)
    {
        $this->validate($request, [
            'firstname' => 'sometimes|required|regex:/^[a-zA-Z]+$/u',
            'lastname' => 'sometimes|required|regex:/^[a-zA-Z]+$/u',
            'email' => 'sometimes|required|unique:App\Models\User|email',
            'username' => 'sometimes|required|min:6|alpha_dash|unique:App\Models\User',
            'dob' => 'sometimes|required|date',
            'phone' => 'sometimes|required|numeric|unique:App\Models\User,phone_number|starts_with:0|digits_between:9,10',
            'current_password' => 'sometimes|required|min:8|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/',
            'new_password' => 'sometimes|required|min:8|confirmed|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/',
            'idcard' => 'sometimes|required|image|mimes:jpg,png,jpeg,svg,webp|max:2048|dimensions:min_width=500,min_height=500',
            'profile' => 'sometimes|required|image|mimes:jpg,png,jpeg,svg,webp|max:2048|dimensions:min_width=500,min_height=500',
        ]);

        if ($request->firstname && $request->lastname) {
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
        }

        $request->email && $user->email = $request->email;
        $request->username && $user->username = $request->username;
        $request->dob && $user->dob = $request->dob;
        $request->phone && $user->phone_number = $request->phone;

        if (Hash::check($request->current_password, $user->password)) {
            $request->new_password && $user->password = Hash::make($request->new_password);
        } else {
            throw ValidationException::withMessages(['current_password' => "Incorrect password!"]);
        }

        if ($request->hasFile('idcard')) {
            $image = $request->idcard;
            $imageName = $this->saveImage($image, 'id_card', 500, 500);
            $user->id_card = $imageName;
        }

        if ($request->hasFile('profile')) {
            $image = $request->profile;
            $imageName = $this->saveImage($image, 'profile', 50, 50);
            $user->profile = $imageName;
        }

        if ($user->save()) {
            return back()->with('success', 'Update successfully!');
        } else {
            return back()->with('error', 'update fail');
        }
    }
}
