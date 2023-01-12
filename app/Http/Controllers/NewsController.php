<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use App\Models\User;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    public function detail(Request $request){
        $slug = $request->slug;
        $news_detail = NewsPost::where('slug', '=', $slug)->firstOrFail();

        return view('pages.news-detail')->with(compact('news_detail'));
    }
}
