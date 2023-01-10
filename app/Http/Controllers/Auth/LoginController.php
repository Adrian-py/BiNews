<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    /*

        Display login page

    */
    public function index() {
        return view("auth.login");
    }

    /*

        Authenticate login attempt

    */
    public function authenticate(Request $request){
        $validated = $request->validate([
            "email" => "required|email:dns",
            "password" => "required|min:5|max:20",
        ]);

        if(Auth::attempt($validated)){
            return redirect()->intended("home");
        }

        return back()->withInput()->with("no-match", "Wrong email or password!");
    }

    /*

        Authenticate login attempt

    */
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect("/");
    }
}
