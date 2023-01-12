@extends("layout.layout")

@section("title", "Home")

@section("content")
    @include("partials.navbar")

    <div>{{$news_detail->title}}</div>

    <div>{{$news_detail->updated_at}} by {{$news_detail->user->name}}</div>

    <div>{{$news_detail->likes->count()}}</div>

    <div>{{asset($news_detail->image)}}</div>

    <div>
        @foreach($news_detail->newsTags as $tag)
            <button>{{$tag->name}}</button>
        @endforeach
    </div>

    <div>{{$news_detail->content}}</div>

    @include("partials.footer")
@endsection
