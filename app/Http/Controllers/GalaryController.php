<?php

namespace App\Http\Controllers;

use App\Models\Galary;
use Illuminate\Http\Request;

class GalaryController extends Controller
{
    public function show()
    {
        $galary = Galary::get();
        return view("adminpanel.pages.addGalary", compact("galary"));
    }
    public function create(Request $request)
    {
        for($i=1; $i<=$request->count;$i++)
        {
            $data = $request->all();
            $galaryPicture = new Galary;
            if($request->hasFile("picture".$i))
            {
                $image = $request->file('picture'.$i);
                $imageName = time() . '_'. rand(1,999999) . $image->getClientOriginalName();
                $image->move(public_path('pictures'), $imageName);
                $data["picture"] = 'pictures/'.$imageName;
            }
            $tempRequest = 'name'.$i;
            $data['name'] = $request->$tempRequest;
            $galaryPicture->create($data);
        }
        return back();


    }
}
