<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\NewsController;
use App\Models\NewsPost;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware("guest")->group(function (){
    // Welcome Page
    Route::get('/', function () {
        return view('pages.home', [
            "news_list" => NewsPost::all(),
        ]);
    });

    // Login Page
    Route::get("/login", [LoginController::class, "index"])->name("view-login");
    Route::post("/login", [LoginController::class, "authenticate"])->name("auth-login");

    // Register Page
    Route::get("/register", [RegisterController::class, "index"])->name("view-register");
    Route::post("/register", [RegisterController::class, "store"])->name("store-register");
});

Route::middleware("auth")->group(function (){
    // Logout
    Route::post("/logout", [LoginController::class, "logout"])->name("logout");

    // Home Page
    Route::get("/home", function(){
        $top_news =  NewsPost::withCount("likes")->orderBy("likes_count", "desc")->first();
        return view("pages.home", [
            "headline_news" => $top_news,
            "news_list" => NewsPost::all()->except($top_news->id),
        ]);
    });

    // News Detail Page
    Route::get("/news/{slug}", [NewsController::class, "detail"]);

    Route::get('/tag/{id}', [NewsController::class, "category"]);

    Route::get('/latest-news', [NewsController::class, "latest"]);
});


