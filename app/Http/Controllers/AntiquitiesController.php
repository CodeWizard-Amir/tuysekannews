<?php

namespace App\Http\Controllers;

use App\Models\Antiquities;
use Illuminate\Http\Request;

class AntiquitiesController extends Controller
{
    public function show()
    {
        return view("adminpanel.pages.addWorks");
    }
}
