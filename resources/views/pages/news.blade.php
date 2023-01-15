@extends('layout.layout')

@section('title', 'Home')

@section('content')
    @include('partials.navbar')

    <main class="w-full flex px-hor">
        <div class="w-4/5">
            <h1 class="text-headline-m font-extrabold">{{ $news->title }}</h1>
            <p>{{ date_format($news->created_at, 'd M Y') }}. by {{ $news->user->name }}</p>
            <div class="flex items-end">
                <p class="leading-5 px-1">{{$news->likes->count()}}</p>
                <img src="{{ asset('images/like.svg') }}" alt="">
            </div>
            <img src="{{ asset('storage/images/lifestyle-placeholder.jpg') }}" alt="">
            <div class="flex gap-2 pb-4">
                @foreach ($news->newsTags as $tags)
                    <div class="px-2 py-1 border-2 border-black">
                        {{ $tags->name }}
                    </div>
                @endforeach
            </div>
            <p>{{ $news->content }}</p>
        </div>
        <div class="w-1/5 relative">
            <div class="fixed pr-hor">
                <h1 class="text-headline-m text-center font-extrabold">Latest News</h1>
                <div class="flex flex-col gap-4">
                    @foreach ($latest_news as $news)
                        <div class="px-2 py-1 border-2 border-black">
                            <h1 class="font-extrabold">{{ $news->title }}</h1>
                            <p class="py-3 font-semibold">{{ date_format($news->created_at, 'd M Y') }}</p>
                            <a href={{ "/news/" . $news->slug }} class="text-primary-600 underline">Read article</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>

    @include('partials.footer')
@endsection
