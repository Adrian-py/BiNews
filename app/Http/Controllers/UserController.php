<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages.profile')->with(compact('user'));
    }

    public function updatePage()
    {
        $user = Auth::user();
        return view('pages.profile-update')->with(compact('user'));
    }

    public function updatePassPage()
    {
        return view('pages.profile-password');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            "name" => "required|min:5|max:20|unique:users,name," . $user->id,
            "image" => "required|mimes:png,jpg,jpeg",
            "email" => "required|email:dns|unique:users,email," . $user->id,
        ]);


        $user = User::find($user->id);
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->image = $request->file('image')->getClientOriginalName();
        $user->save();

        Storage::putFileAs('/public/images', $request->image, $request->file('image')->getClientOriginalName());

        return redirect('/profile');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            "password" => "required|min:5|max:20|confirmed"
        ]);

        $user = User::find($user->id);
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/profile');
    }
}
