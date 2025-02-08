<?php

namespace App\Http\Controllers;

use App\Models\Antiquities;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class AntiquitiesController extends Controller
{
    public function show()
    {
        $categoryItems = Category::get();
        $works = Antiquities::get();
        return view("adminpanel.pages.addWorks",compact("categoryItems","works"));
    }
    public function create(Request $request)
    {
        $works = new Antiquities;
        $data = $request->all();
        $data["AntiquitiyID"] = Str::random(16);
        $catId = rand(10000000,99999999);
        if($request->hasFile("picture"))
        {
            $image = $request->file('picture');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('pictures'), $imageName);
            $data["picture"] = 'pictures/'.$imageName;
        }
        if(!$request->categoryID){
            $category = new Category;
            $catData["categoryID"] = $catId;
            $catData["name"] = $request->categoryName;
            $category->create($catData);
            $data['categoryID'] = $catId;
        }
        $works->create($data);
        return back();
    }

    public function delete($id)
    {
        $work = Antiquities::find($id);
        if(file_exists($work->picture))
        {
            @unlink($work->picture);
        }
        $work->delete();
        return back();
    }
}
