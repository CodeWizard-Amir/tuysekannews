<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function create(Newsletter $newsletter , Request $request)
    {
        $data = $request->all();
        $newsletter->create($data);
        return response()->json(['message' => "ok"]);
    }
}
