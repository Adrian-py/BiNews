<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Tag;
use App\Models\User;
use App\Models\Likes;
use App\Models\NewsPost;
use App\Models\NewsTags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    //
    public function detail(Request $request){
        $slug = $request->slug;
        $news = NewsPost::where('slug', '=', $slug)->firstOrFail();

        $latest_news = NewsPost::all()->sortByDesc("created_at")->take(3);

        return view('pages.news')->with(compact('news', 'latest_news'));
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

    public function viewAddNews(){

        return view('pages.add-news');
    }

    public function addNews(Request $request){
        $request->validate([
            'title' => 'required|unique:news_posts',
            'image' => 'mimes:png,jpg,jpeg',
            'tags' => 'required',
            'content' => 'required'
        ]);

        if(!$request->image){
            $newsPost = NewsPost::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'content' => $request->content,
                'user_id' => Auth::user()->id
            ]);
        }
        else{
            $newsPost = NewsPost::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'content' => $request->content,
                'user_id' => Auth::user()->id,
                'image' => $request->file('image')->getClientOriginalName()
            ]);

            Storage::putFileAs('/public/images', $request->image, $request->file('image')->getClientOriginalName());
        }

        foreach($request->tags as $tag){
            NewsTags::create([
                'news_post_id' => $newsPost->id,
                'tag_id' => $tag
            ]);
        }

        return back();
    }
}
