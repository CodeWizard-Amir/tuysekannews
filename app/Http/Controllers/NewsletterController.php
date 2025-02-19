<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function show()
    {
        $newsletter = Newsletter::get();
        return view('adminpanel.pages.Newsletter',compact('newsletter'));
    }
    public function create(Newsletter $newsletter , Request $request)
    {
        $data = $request->all();
        $newsletter->create($data);
        return response()->json(['message' => "ok"]);
    }

    public function delete($id)
    {
        $newsletter = Newsletter::findOrFail($id);
        $newsletter->delete();
        return back()->with("deleted_success","ok");
    }
}
