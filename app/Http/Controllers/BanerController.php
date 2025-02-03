<?php

namespace App\Http\Controllers;

use App\Models\Baner;
use Illuminate\Http\Request;

class BanerController extends Controller
{
    public function show()
    {
        return view("adminpanel.pages.addBaner");
    }
}
