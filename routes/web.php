<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
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

Route::middleware("guest")->group(function () {
    // Welcome Page
    Route::get('/', function () {
        $news_list =  NewsPost::withCount("likes")->orderBy("likes_count", "desc")->get();

        return view('pages.home', [
            "news_list" => $news_list,
        ]);
    });

    // Login Page
    Route::get("/login", [LoginController::class, "index"])->name("view-login");
    Route::post("/login", [LoginController::class, "authenticate"])->name("auth-login");

    // Register Page
    Route::get("/register", [RegisterController::class, "index"])->name("view-register");
    Route::post("/register", [RegisterController::class, "store"])->name("store-register");
});

Route::middleware("auth")->group(function () {
    // Logout
    Route::post("/logout", [LoginController::class, "logout"])->name("logout");

    // Home Page
    Route::get("/home", function () {
        $news_list =  NewsPost::withCount("likes")->orderBy("likes_count", "desc")->get();

        $top_news = $news_list->first();

        return view("pages.home", [
            "headline_news" => $top_news,
            "news_list" => $news_list->except($top_news->id),
        ]);
    });

    // Handle Liking News
    Route::post("/likes/{slug}", [NewsController::class, "like"]);

    // News Detail Page
    Route::get("/news/{slug}", [NewsController::class, "detail"]);

    Route::get('/tag/{id}', [NewsController::class, "category"]);

    Route::get('/latest-news', [NewsController::class, "latest"]);

    Route::get('/add-news', [NewsController::class, "viewAddNews"]);
    Route::post('/add-news', [NewsController::class, "addNews"]);

    Route::get('/update-news/{slug}', [NewsController::class, "viewUpdateNews"]);
    Route::post('/update-news/{slug}', [NewsController::class, "updateNews"]);

    Route::post('/delete-news/{slug}', [NewsController::class, "deleteNews"]);

    Route::get('/manage', [NewsController::class, "manage"]);

    Route::get('/profile', [UserController::class, "index"]);
    Route::get('/update-profile', [UserController::class, "updatePage"]);
    Route::get('/password-profile', [UserController::class, "updatePassPage"]);

    Route::post('/update-profile', [UserController::class, "update"]);
    Route::post('/password-profile', [UserController::class, "updatePassword"]);
});
