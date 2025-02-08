<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\newsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function PHPUnit\Framework\fileExists;

class NewsController extends Controller
{
    public function show()
    {
        $newses = News::get();
        $newsCategory = newsCategory::get();
        return view("adminpanel.pages.addNews",compact("newses","newsCategory"));
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

    public function delete($id)
    {
        $news = News::find($id);
        if(file_exists($news->picture))
        {
            @unlink($news->picture);
        }
        $news->delete();
        return back();
    }
}
