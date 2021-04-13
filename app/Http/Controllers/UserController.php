<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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

    public function update(HttpRequest $request, User $user)
    {
        $this->validate($request, [
            'firstname' => ['sometimes', 'required', 'regex:/^[a-zA-Z]+$/u'],
            'lastname' => ['sometimes', 'required', 'regex:/^[a-zA-Z]+$/u'],
            'email' => ['sometimes', 'required', 'unique:App\Models\User', 'email'],
            'username' => ['sometimes', 'required', 'min:6', 'alpha_dash', 'unique:App\Models\User'],
            'dob' => ['sometimes', 'required', 'date'],
            'phone' => ['sometimes', 'required', 'numeric', 'unique:App\Models\User,phone_number', 'starts_with:0', 'digits_between:9,10'],
            'current_password' => ['sometimes', 'required', 'min:8', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/'],
            'new_password' => ['sometimes', 'required', 'min:8', 'confirmed', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/'],
            'housenumber' => ['sometimes', 'required_with:street,commune,district,province', 'string'],
            'street' => ['sometimes', 'required_with:housenumber,commune,district,province', 'string'],
            'commune' => ['sometimes', 'required_with:housenumber,street,district,province', 'string'],
            'district' => ['sometimes', 'required_with:housenumber,street,commune,province', 'string'],
            'province' => ['sometimes', 'required_with:housenumber,street,commune,district', 'string'],
            'idcard' => ['sometimes', 'required', 'image,mimes:jpg,png,jpeg,svg,webp', 'max:2048', 'dimensions:min_width=500,min_height=500'],
            'profile' => ['sometimes', 'required', 'image,mimes:jpg,png,jpeg,svg,webp', 'max:2048', 'dimensions:min_width=500,min_height=500'],
        ]);

        if ($request->firstname && $request->lastname) {
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
        }

        $request->email && $user->email = $request->email;
        $request->username && $user->username = $request->username;
        $request->dob && $user->dob = $request->dob;
        $request->phone && $user->phone_number = $request->phone;

        if ($request->current_password) {
            if (!Hash::check($request->current_password, $user->password)) {
                throw ValidationException::withMessages(['current_password' => "Incorrect password!"]);
            }

            $request->new_password && $user->password = Hash::make($request->new_password);
        }

        if ($request->hasFile('idcard')) {
            $image = $request->idcard;
            $imageName = $this->saveImage($image, 'id_card', 500, 500);
            $removeImage = $this->removeImage($user->id_card, 'id_card');
            $user->id_card = $imageName;
        }

        if ($request->hasFile('profile')) {
            $image = $request->profile;
            $imageName = $this->saveImage($image, 'profile', 400, 400);
            $removeImage = $this->removeImage($user->profile, 'profile');
            $user->profile = $imageName;
        }

        $request->housenumber && $user->housenumber = $request->housenumber;
        $request->street && $user->street = $request->street;
        $request->district && $user->district = $request->district;
        $request->commune && $user->commune = $request->commune;
        $request->province && $user->province = $request->province;

        if (!$user->save()) {
            return back()->with('error', 'Update fail');
        }

        return back()->with('success', 'Update successfully!');
    }

    public function destroy(User $user)
    {
        $user::findOrFail($user->id);

        if (!$user->id == auth()->user()->id) {
            abort(403);
        }

        $user->delete();
        return redirect('/')->with('success', 'Account has been removed');
    }
}
