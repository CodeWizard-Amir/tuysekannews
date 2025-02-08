<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\newsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function show()
    {
        return view("adminpanel.pages.addNews");
    }
    public function create(Request $request)
    {
        $news = new News;
        $data = $request->all();
        $data["newsID"] = Str::random(16);
        $catId = rand(1000000,9999999);
        if($request->hasFile("picture"))
        {
            $image = $request->file('picture');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('pictures'), $imageName);
            $data["picture"] = 'pictures/'.$imageName;
        }
        if(!$request->newsCategoryID){
            $category = new newsCategory;
            $catData["newsCategoryID"] = $catId;
            $catData["name"] = $request->newsCategoryName;
            $category->create($catData);
            $data['newsCategoryID'] = $catId;
        }
        $news->create($data);
        return back();
    }
}
