<?php

use App\Http\Controllers\AntiquitiesController;
use App\Http\Controllers\BanerController;
use App\Http\Controllers\CelebritiesController;
use App\Http\Controllers\GalaryController;
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
Route::get('/addWorks',[AntiquitiesController::class, "show"])->name("show.works");
Route::post('/saveWorks',[AntiquitiesController::class, "create"])->name("create.antiquitise");


Route::get('/addGalary',[GalaryController::class, "show"])->name("show.galary");
Route::post('/saveGalary',[GalaryController::class, "create"])->name("create.galary");
// --------------------------------------------------
Route::get("/addAdmin" , [UserController::class, "show"])->name("show.users");
Route::post("/saveAdmin" , [UserController::class, "create"])->name("create.user");
// ---------------------------------------------------
Route::get("/addBaner" , [BanerController::class, "show"])->name("show.baner");
Route::post("/saveBaner" , [BanerController::class, "create"])->name("create.baner");


Route::get("/addCelebrity" , [CelebritiesController::class, "show"])->name("show.celebritise");
Route::post("/saveCelebrity" , [CelebritiesController::class, "create"])->name( "create.celebrity");