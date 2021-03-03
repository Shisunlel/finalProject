<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.login');
    }

    public function store(HttpRequest $request)
    {
        $this->validate($request, [
            'email' => 'required:App\Models\User|email',
            'password' => 'required|min:8|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/',

        ]);

        $login = $request->only('email', 'password');

        if (!Auth::attempt($login, $request->remember)) {
            return back()->with("error", "Email or Password doesn't matched");
        }

        return redirect('/');
    }
}
