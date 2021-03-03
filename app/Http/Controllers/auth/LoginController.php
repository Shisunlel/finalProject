<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    

    public function index()
    {
        return view('auth.login');
    }
    public function checklogin(HttpRequest $request)
    {
        

        $this->validate($request, [            
            'email' => 'required:App\Models\User|email',            
            'password' => 'required|min:8|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/',
            
        ]);      
        
        $login = $request->only('email', 'password');

        if (Auth::attempt($login)) {
            //Auth::attempt($request->only('email', 'password'));            
            return redirect('/');
        }
        else        
            {
            return back();
            }
        //Auth::logout();
    }
}
