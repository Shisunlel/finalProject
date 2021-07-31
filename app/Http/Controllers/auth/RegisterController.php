<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.register');
    }

    public function store(HttpRequest $request)
    {
        $this->validate($request, [
            'firstname' => ['required', 'regex:/^[a-zA-Z]+$/u'],
            'lastname' => ['required', 'regex:/^[a-zA-Z]+$/u'],
            'email' => ['required', 'unique:App\Models\User,email'],
            'username' => ['required', 'min:6', 'alpha_dash', 'unique:App\Models\User'],
            'password' => ['required', 'confirmed', 'min:8', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/'],
        ]);

        User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]); 
        
        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->with("error", "Unexpected error occur!!");
        }
<<<<<<< HEAD

        $request->session()->regenerate();

=======
         
        $request->session()->regenerate();
>>>>>>> c6776fe51753283fef05e62fbc9d427af7e220e2
        return redirect()->intended('/');

    }
}
