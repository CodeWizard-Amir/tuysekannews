<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show()
    {
        $admins = User::get();
        return view("adminpanel.pages.addAdmin", compact("admins"));
    }
    public function show_update($id)
    {
        $user = User::findOrFail($id);
        return view("adminpanel.pages.updateAdmin", compact("user"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user = new User;
        $data = $request->all();
        $data["userID"] = Str::random(16);
        $data["status"] = $request->status == null ? 0 : 1;
        $user->create($data);
        return back()->with("added_success","ok");
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->all();
        $user->update($data);
        return to_route('show.users')->with("updated_success" ,"ok");
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with("deleted_success","ok");
    }
}
