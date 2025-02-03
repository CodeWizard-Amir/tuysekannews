<?php

namespace App\Http\Controllers;

use App\Models\Celebrities;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CelebritiesController extends Controller
{
    public function show()
    {
        $celebrities = Celebrities::get();
        return view("adminpanel.pages.addCelebritise", compact("celebrities"));
    }
    public function create(Request $request){
        $celebrity = new Celebrities;
        $data = $request->all();
        if($request->hasFile("picture"))
        {
            $image = $request->file('picture');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('pictures'), $imageName);
            $data["picture"] = 'pictures/'.$imageName;
        }
        $data["celebrityID"] = Str::random(16);
        $celebrity->create($data);
        return back();
    }
}
