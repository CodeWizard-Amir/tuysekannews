<?php

namespace App\Http\Controllers;

use App\Models\Antiquities;
use App\Models\Celebrities;
use App\Models\News;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class SearchCntroller extends Controller
{
    public function search_form(Request $request)
    {
        $query = $request->q;
        if (!$query) {
            return back();
        }
        $query = htmlspecialchars(strip_tags($query));
        // تنظیمات SEO
        SEOMeta::setTitle("نتایج جستجو برای: $query", false);
        SEOMeta::setDescription("لیست نتایج جستجو برای \"$query\" شامل اخبار، شخصیتهای مشهور و آثار تاریخی");
        SEOMeta::addKeyword([
            "جستجوی $query",
            "$query تویسرکان",
            "اخبار $query",
            "آثار تاریخی $query",
        ]);
        // ==============================================================================
        $news_result = News::where('title', 'LIKE', "%$query%")->orWhere('description', 'LIKE', "%$query%")->get();
        $celebrity_result = Celebrities::where('name', 'LIKE', "%$query%")->orWhere('description', 'LIKE', "%$query%")->get();
        $work_result = Antiquities::where('name', 'LIKE', "%$query%")->orWhere('description', 'LIKE', "%$query%")->get();
        return view("pages.searchResult", compact('query', 'news_result', 'celebrity_result', 'work_result'));
    }
}
