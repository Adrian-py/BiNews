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
        $news = NewsPost::where('slug', '=', $slug)->withCount("likes")->get()->firstOrFail();

        $latest_news = NewsPost::all()->sortByDesc("created_at")->take(3);

        $user_liked = Likes::where("news_post_id", $news->id)->where("user_id", Auth::user()->id)->exists();

        return view('pages.news', [
            "news" => $news,
            "latest_news" => $latest_news,
            "user_liked" => $user_liked,
        ]);
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
            'title' => 'required|unique:news_posts,title',
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

    public function viewUpdateNews(Request $request){
        $news = NewsPost::where('slug', '=', $request->slug)->firstOrFail();

        return view('pages.update-news')->with(compact('news'));
    }

    public function updateNews(Request $request){
        $newsPost = NewsPost::where('slug', '=', $request->slug)->firstOrFail();
        $request->validate([
            'title' => 'required',
            'image' => 'mimes:png,jpg,jpeg',
            'tags' => 'required',
            'content' => 'required'
        ]);

        if(!$request->image){
            $newsPost->title = $request->title;
            $newsPost->slug = Str::slug($request->title);
            $newsPost->content = $request->content;

            $newsPost->save();
        }
        else{
            Storage::putFileAs('/public/images', $request->image, $request->file('image')->getClientOriginalName());

            $newsPost->title = $request->title;
            $newsPost->slug = Str::slug($request->title);
            $newsPost->content = $request->content;
            $newsPost->image = $request->file('image')->getClientOriginalName();

            $newsPost->save();
        }
        foreach($newsPost->newsTags as $tag){
            $tag->pivot->delete();
        }

        foreach($request->tags as $tag){
            NewsTags::create([
                'news_post_id' => $newsPost->id,
                'tag_id' => $tag
            ]);
        }

        return redirect('/news/'.$newsPost->slug);
    }

    public function deleteNews(Request $request){
        $newsPost = NewsPost::where('slug', '=', $request->slug)->firstOrFail();

        foreach($newsPost->newsTags as $tag){
            $tag->pivot->delete();
        }

        foreach($newsPost->likes as $like){
            $like->delete();
        }

        $newsPost->delete();

        return redirect('/home');
    }

    public function manage(){
        $user = Auth::user();

        $news_list = $user->newsPost;

        return view('pages.manage-news')->with(compact('news_list'));
    }
}
