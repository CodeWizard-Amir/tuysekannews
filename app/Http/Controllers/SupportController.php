<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function show()
    {
        $support = Support::get();
        return view('adminpanel.pages.Support',compact('support'));
    }
    public function create(Support $support, Request $request)
    {
        $data = $request->all();
        $support->create($data);
        return response()->json(['message' => "success"]);
    }
}
