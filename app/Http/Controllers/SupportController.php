<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function show()
    {
        $support = Support::where('visited',0)->get();
        $support_visited = Support::where('visited',1)->get();
        return view('adminpanel.pages.Support',compact('support','support_visited'));
    }
    public function create(Support $support, Request $request)
    {
        $data = $request->all();
        $support->create($data);
        return response()->json(['message' => "success"]);
    }

    public function delete($id)
    {
        $support = Support::findOrFail($id);
        $support->delete();
        return back()->with('deleted_success','its deleted');
    }
    public function update($id)
    {
        $support = Support::findOrFail($id);
        $support->visited = 1;
        $support->save();
        return back()->with('updated_success','its visited!');
    }
}
