<?php

use App\Http\Controllers\BanerController;
use App\Http\Controllers\CelebritiesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewHandelerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", [ViewHandelerController::class, "Home"])->name("websitepages.home");
Route::get('/adminpanel', function () {
    return view('adminpanel.layout.MainAdminPanelLayout');
});
// --------------------------------------------------
Route::get("/addAdmin" , [UserController::class, "show"])->name("show.users");
Route::post("/saveAdmin" , [UserController::class, "create"])->name("create.user");
// ---------------------------------------------------
Route::get("/addBaner" , [BanerController::class, "show"])->name("show.baner");


Route::get("/addCelebrity" , [CelebritiesController::class, "show"])->name("show.celebritise");
Route::post("/saveCelebrity" , [CelebritiesController::class, "create"])->name(name: "create.celebrity");