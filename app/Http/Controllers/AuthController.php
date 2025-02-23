<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use League\CommonMark\Extension\CommonMark\Parser\Inline\EscapableParser;

class AuthController extends Controller
{
    public function Login_User(Request $request)
    {
        $user = User::where('phone' , $request->username)->orWhere('email',$request->username)->first();
        if($user && Hash::check($request->password,$user->password ))
        {
            Auth::login($user);
            return to_route('show.about');
        }
        else
        {
            return back()->with('error_login', "کاربری با این مشخصات یافت نشد!");
        }
    }

    public function Logout_User()
    {
        if(Auth::check())
        {
            Auth::logout();
            return to_route('websitepages.home');

        }
        else
        {
            abort(404);
        }
    }
    public function Profile_User()
    {
        if(Auth::check())
        {
            return view('adminpanel.pages.changeProfile');
        }
        else
        {
            abort(404);
        }
    }
    public function Update_User(Request $request)
    {
        if(Auth::check())
        {
            $user = User::find(auth()->user()?->id);
            $data = $request->all();
            if ($request->hasFile("picture")) {
                if(file_exists($user->picture) && !$user->picture == "assets/img/userImagePlaceholder.png")
                {
                    @unlink($user->picture);
                }
                $image = $request->file('picture');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('pictures'), $imageName);
                $data["picture"] = 'pictures/' . $imageName;
            }
            $user->update($data);
            return to_route('show.about');
        }
        else
        {
            abort(404);
        }
    }
}
