<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Antiquities;
use App\Models\Baner;
use App\Models\Celebrities;
use App\Models\Galary;
use App\Models\News;
use Illuminate\Http\Request;

class ViewHandelerController extends Controller
{
    public function Home()
    {
        $celebritise = Celebrities::get()->take(12);
        $baners = Baner::get();
        $firstpicure = Galary::inRandomOrder()->first();
        $works = Antiquities::get();
        $news = News::get()->take(8);
        $secondpicture = Galary::whereNotIn("id", [$firstpicure?->id])->inRandomOrder()->first();
        $galary = Galary::whereNotIn("id", [$secondpicture?->id, $firstpicure?->id])->get();
        return view("pages.home", compact("celebritise", "news", "baners", "works", "galary", "firstpicure", "secondpicture"));
    }
    public function Galary()
    {
        $galaryImages = Galary::get();
        return view("pages.Galary",compact('galaryImages'));
    }
    public function Celebritise()
    {
        $celebritise = Celebrities::get();

        return view("pages.Celebritise",compact("celebritise"));
    }
    public function Each_Celebrity($celebrityID)
    {
        $celebrity = Celebrities::where("celebrityID",$celebrityID)->get()->firstOrFail();
        $news = News::inRandomOrder()->get()->take(5);
        $celebritise = Celebrities::get()->except($celebrity->id)->take(5);
        return view("pages.Each_celebrity",compact("celebrity","news","celebritise"));
    }
    public function News()
    {
        $news = News::get();
        return view('pages.news',compact("news"));
    }
    public function Antiquities()
    {
        $works = Antiquities::get();
        return view('pages.works',compact("works"));
    }

    public function Each_work($id)
    {
        $work = Antiquities::findOrFail($id);
        $otherWorks = Antiquities::get();
        $news = News::inRandomOrder()->get()->take(5);
        $celebritise = Celebrities::inRandomOrder()->get()->take(5);
        return view('pages.Each_work',compact('work','news','celebritise','otherWorks'));
    }

    public function About()
    {
        $about = About::get()->first();
        return view('pages.About_US',compact('about'));
    }


}
