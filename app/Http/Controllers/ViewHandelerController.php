<?php

namespace App\Http\Controllers;

use App\Models\Celebrities;
use Illuminate\Http\Request;

class ViewHandelerController extends Controller
{
    public function Home(){
        $celebritise = Celebrities::get();
        return view("pages.home", compact("celebritise"));
    }
}
