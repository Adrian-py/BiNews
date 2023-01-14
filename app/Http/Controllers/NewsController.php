<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Likes;
use App\Models\NewsPost;
use App\Models\NewsTags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    //
    public function detail(Request $request){
        $slug = $request->slug;
        $news_detail = NewsPost::where('slug', '=', $slug)->firstOrFail();

        return view('pages.news-detail')->with(compact('news_detail'));
    }

    public function category(Request $request){
        $tag_id = $request->id;
        $news_list = Tag::find($tag_id)->newsTags()->get();

        #temporary use home view
        return view('pages.home')->with(compact('news_list'));
    }

    public function latest(){
        $news_list = NewsPost::all()->sortByDesc("created_at");

        #temporary use home view
        return view('pages.latest-news', [
            "news_list" => $news_list,
        ]);
    }

    public function like(NewsPost $newsPost){
        $newLike = [
            "news_post_id" => $newsPost->id,
            "user_id" => Auth::user()->id,
        ];
        Likes::create($newLike);
        return back();
    }
}
