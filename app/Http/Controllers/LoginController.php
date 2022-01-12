<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        if (Auth::viaRemember()) {
            return redirect()->intended('/home');
        }

        return view("login");
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'=>['required','email'],
            'password'=>['required','min:8']
        ]);

        // Remember Me
        $minutes = 120;
        if($request->remember_me){
            Cookie::queue('EMAIL_COOKIE', $request->email, $minutes); # time in minute(s)
            Cookie::queue('PASSWORD_COOKIE', $request->password, $minutes);
        }

        // Setting up auth with remember_token : To prevent cookie hijacking
        if(Auth::attempt($credentials, true)){
            $username = DB::table('users')->where('email', $credentials['email'])->first()->user_name;
            Session::put('auth_session', $credentials);
            Session::put('username_session', $username);
            $request->session()->regenerate();

            return redirect()->intended('/home');
        }

        return back()->with('loginError', 'Login Failed');
    }

    public function logout(){
        Auth::logout();
        return redirect('/home');
    }
}
