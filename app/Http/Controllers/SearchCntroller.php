<?php

namespace App\Http\Controllers;

use App\Models\Antiquities;
use App\Models\Celebrities;
use App\Models\News;
use Illuminate\Http\Request;

class SearchCntroller extends Controller
{
    public function search_form(Request $request)
    {
        $query = $request->q;
        if (!$query) {
            return back();
        }
        $news_result = News::where('title', 'LIKE', "%$query%")->orWhere('description', 'LIKE', "%$query%")->get();
        $celebrity_result = Celebrities::where('name', 'LIKE', "%$query%")->orWhere('description', 'LIKE', "%$query%")->get();
        $work_result = Antiquities::where('name', 'LIKE', "%$query%")->orWhere('description', 'LIKE', "%$query%")->get();
        return view("pages.searchResult",compact('query','news_result','celebrity_result','work_result'));
    }
}
