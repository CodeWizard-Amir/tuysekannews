<?php

use App\Http\Controllers\AntiquitiesController;
use App\Http\Controllers\BanerController;
use App\Http\Controllers\CelebritiesController;
use App\Http\Controllers\GalaryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\SupportController;
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
Route::get("/Galary", [ViewHandelerController::class, "Galary"])->name("websitepages.Galary");
Route::get("/News", [ViewHandelerController::class, "News"])->name("websitepages.News");
Route::get("/Antiquities", [ViewHandelerController::class, "Antiquities"])->name("websitepages.Antiquities");
Route::get("/Celebritise", [ViewHandelerController::class, "Celebritise"])->name("websitepages.Celebritise");
Route::get("/about-us", [ViewHandelerController::class, "About"])->name("websitepages.About");
Route::get("/Celebrity/{celebrityID}/{name}", [ViewHandelerController::class, "Each_celebrity"])->name("websitepages.celebrity");
Route::get("/Antiquity/{id}/{name}", [ViewHandelerController::class, "Each_work"])->name("websitepages.Antiquitiy");




Route::get('/adminpanel', function () {
    return view('adminpanel.layout.MainAdminPanelLayout');
});
Route::get('/addNews', [NewsController::class, "show"])->name("show.news");
Route::post('/saveNews', [NewsController::class, "create"])->name("create.news");
Route::delete('/deletenews/{id}', [NewsController::class, "delete"])->name("delete.news");

Route::get('/addWorks',[AntiquitiesController::class, "show"])->name("show.works");
Route::post('/saveWorks',[AntiquitiesController::class, "create"])->name("create.antiquitise");
Route::delete('/deleteWorks/{id}',[AntiquitiesController::class, "delete"])->name("delete.antiquitise");


Route::get('/addGalary',[GalaryController::class, "show"])->name("show.galary");
Route::post('/saveGalary',[GalaryController::class, "create"])->name("create.galary");
Route::delete('/deleteGalary/{id}',[GalaryController::class, "delete"])->name("delete.galary");
// --------------------------------------------------
Route::get("/addAdmin" , [UserController::class, "show"])->name("show.users");
Route::post("/saveAdmin" , [UserController::class, "create"])->name("create.user");
// ---------------------------------------------------
Route::get("/addBaner" , [BanerController::class, "show"])->name("show.baner");
Route::post("/saveBaner" , [BanerController::class, "create"])->name("create.baner");
Route::delete("/deleteBaner/{id}" , [BanerController::class, "delete"])->name("delete.baner");


Route::get("/addCelebrity" , [CelebritiesController::class, "show"])->name("show.celebritise");
Route::post("/saveCelebrity" , [CelebritiesController::class, "create"])->name( "create.celebrity");
Route::delete("/deleteCelebrity/{id}" , [CelebritiesController::class, "delete"])->name( "delete.celebrity");

Route::post("/saveSupport" , [SupportController::class, "create"])->name( "create.support");
Route::post("/saveNewsletter" , [NewsletterController::class, "create"])->name( "create.newsletter");