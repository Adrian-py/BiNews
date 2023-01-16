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
        $tag = Tag::find($request->id);
        $news_list = $tag->newsTags()->withCount("likes")->orderBy("likes_count", "desc")->get();

        return view('pages.category')->with(compact('tag', 'news_list'));
    }

    public function latest(){
        $news_list = NewsPost::withCount("likes")->orderBy("created_at", "desc")->get();

        return view('pages.latest-news', [
            "news_list" => $news_list,
        ]);
    }

    public function like(Request $request){
        $newsPost = NewsPost::where('slug', '=', $request->slug)->firstOrFail();
        $user = Auth::user();

        $likes = Likes::where('news_post_id', '=', $newsPost->id)
                        ->where('user_id', '=', $user->id)->get();

        // echo $like->user_id;
        if($likes->count() > 0){
            foreach($likes as $like){
                $like->delete();
            }
        }
        else{
            Likes::create([
                'news_post_id' => $newsPost->id,
                'user_id' => $user->id
            ]);
        }

        return redirect()->back();
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
