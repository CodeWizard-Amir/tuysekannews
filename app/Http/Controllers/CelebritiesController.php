<?php

namespace App\Http\Controllers;

use App\Models\Celebrities;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function Symfony\Component\String\b;

class CelebritiesController extends Controller
{
    public function show()
    {
        $celebrities = Celebrities::get();
        return view("adminpanel.pages.addCelebritise", compact("celebrities"));
    }
    public function show_update($id)
    {
        $celebrity = Celebrities::findOrFail($id);
        return view("adminpanel.pages.updateCelebrity", compact("celebrity"));
    }
    public function create(Request $request)
    {
        $celebrity = new Celebrities;
        $data = $request->all();
        if ($request->hasFile("picture")) {
            $image = $request->file('picture');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('pictures'), $imageName);
            $data["picture"] = 'pictures/' . $imageName;
        }
        $data["celebrityID"] = Str::random(16);
        $celebrity->create($data);
        return back()->with('added_success', 'عملیات با موفقیت انجام شد!');
    }
    
    public function update(Request $request,$id)
    {
        $celebrity = Celebrities::findOrFail($id);
        $data = $request->all();
        if ($request->hasFile("picture")) {
            if(file_exists($celebrity->picture))
            {
                @unlink($celebrity->picture);
            }
            $image = $request->file('picture');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('pictures'), $imageName);
            $data["picture"] = 'pictures/' . $imageName;
        }
        $celebrity->update($data);
        return to_route('show.celebritise')->with('updated_success', 'عملیات با موفقیت انجام شد!');

    }
    public function delete($id)
    {
        $celebrity = Celebrities::find($id);
        if (file_exists($celebrity->picture)) {
            @unlink($celebrity->picture);
        }
        $celebrity->delete();
        return back()->with('deleted_success', 'عملیات با موفقیت انجام شد!');
    }
}
