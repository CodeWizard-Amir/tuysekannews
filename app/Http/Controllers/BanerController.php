<?php

namespace App\Http\Controllers;

use App\Models\Baner;
use Illuminate\Http\Request;
use Illuminate\Http\File;
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
        return back()->with("added_success", "ok");
    }
    public function delete($id)
    {
        $baner = Baner::find($id);
        $img = $baner->picture;
        if(file_exists($img))
        {
            @unlink($img);
        }
        $baner->delete();
        return back()->with("deleted_success", "ok");
    }
}
