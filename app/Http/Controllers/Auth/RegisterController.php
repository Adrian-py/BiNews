<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class RegisterController extends Controller
{
    /*

        Display register page

    */
    public function index() {
        return view("auth.register");
    }

    /*

        Validate and register new user

    */
    public function store(Request $request){
        $validated = $request->validate([
            'name' => "required|min:5|max:20|unique:users",
            "email" => "required|email:dns|unique:users",
            "password" => "required|min:5|max:20|confirmed",
        ]);

        $validated["password"] = bcrypt($validated["password"]);

        $newUser = User::create($validated);

        return redirect("/login")->with("success", "Register successful!");
    }
}
