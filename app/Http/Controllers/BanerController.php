<?php

namespace App\Http\Controllers;

use App\Models\Baner;
use Illuminate\Http\Request;

class BanerController extends Controller
{
    public function show()
    {
        $baners = Baner::get();
        return view("adminpanel.pages.addBaner", compact("baners"));
    }
    public function create(Request $request)
    {
        $baner = new Baner;
        $data = $request->all();
        if ($request->hasFile("picture")) {
            $image = $request->file('picture');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('pictures'), $imageName);
            $data["picture"] = 'pictures/' . $imageName;
        }
        $data["link"] = $request->link ? $request->link : "nothing";
        $baner->create($data);
        return back();
    }
}
