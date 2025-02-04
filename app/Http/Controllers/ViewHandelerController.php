<?php

namespace App\Http\Controllers;

use App\Models\Antiquities;
use App\Models\Baner;
use App\Models\Celebrities;
use App\Models\Galary;
use Illuminate\Http\Request;

class ViewHandelerController extends Controller
{
    public function Home()
    {
        $celebritise = Celebrities::get();
        $baners = Baner::get();
        $firstpicure = Galary::inRandomOrder()->first();
        $works = Antiquities::get();
        $secondpicture = Galary::whereNotIn("id", [$firstpicure->id])->inRandomOrder()->first();
        $galary = Galary::whereNotIn("id", [$secondpicture->id])->get();
        return view("pages.home", compact("celebritise", "baners", "works", "galary", "firstpicure", "secondpicture"));
    }
}
