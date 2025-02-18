<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function show()
    {
        $about = About::get()->first();
        $data_of_about = $about ? $about : false;
        return view('adminpanel.pages.addAbout',compact('data_of_about'));
    }
    public function create(About $about ,Request $request)
    {
        $data = $request->all();
        $about->create($data);
        return back()->with('success', 'عملیات با موفقیت انجام شد!');
    }
    public function update(Request $request,$id)
    {
        $update_data_about = About::find($id); 
        $data = $request->all();
        $update_data_about->update($data);
        return back()->with('success', 'عملیات با موفقیت انجام شد!');
    }
}
