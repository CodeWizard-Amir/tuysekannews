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
    public function show_update($id)
    {
        $categoryItems = Category::get();
        $work = Antiquities::findOrFail($id);
        return view("adminpanel.pages.updateWork",compact("categoryItems","work"));
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
        return back()->with('added_success', 'عملیات با موفقیت انجام شد!');
    }
    public function update(Request $request, $id)
    {
        $work = Antiquities::findOrFail($id);
        $data = $request->all();
        if ($request->hasFile("picture")) {
            if(file_exists($work->picture))
            {
                @unlink($work->picture);
            }
        $catId = rand(10000000,99999999);
            if(!$request->categoryID){
                $category = new Category;
                $catData["categoryID"] = $catId;
                $catData["name"] = $request->categoryName;
                $category->create($catData);
                $data['categoryID'] = $catId;
            }
            $image = $request->file('picture');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('pictures'), $imageName);
            $data["picture"] = 'pictures/' . $imageName;
        }
        $work->update($data);
        return to_route('show.works')->with("updated_success" , "good job");

    }

    public function delete($id)
    {
        $work = Antiquities::find($id);
        if(file_exists($work->picture))
        {
            @unlink($work->picture);
        }
        $work->delete();
        return back()->with('deleted_success', 'عملیات با موفقیت انجام شد!');
    }
}
