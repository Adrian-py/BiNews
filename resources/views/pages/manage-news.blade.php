@extends('layout.layout')

@section('title', 'My News')

@section('content')
    @include('partials.navbar')
    <section class="pt-[4vh] pb-[2vh] px-hor-mob flex flex-col desktop-s:px-hor">
        <h1 class="mb-[1rem] text-headline-s font-bold desktop-s:text-headline-l">Latest News</h1>
        <a href="/add-news" class="w-fit mb-[1rem] px-[1rem] py-[0.5rem] flex gap-[0.5rem] bg-primary-300 text-white-100 rounded-lg">
            Create Post

            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 19V13H5V11H11V5H13V11H19V13H13V19H11Z" fill="currentColor"/>
            </svg>
        </a>

        <div class="grid grid-cols-1 gap-[2.5rem] desktop-s:grid-cols-3">
            @foreach ($news_list as $news)
                <div>
                    @if(!$news->image)
                        <img src="{{ asset("storage/images/" . $news->newsTags->first()->name . "-placeholder.jpg") }}" alt="" class="w-full h-[16rem] object-cover">
                    @else
                        <img src="{{ asset('storage/images/' . $news->image) }}" alt="{{ $news->title }}">
                    @endif

                    <div class="px-[5.26%] py-[1rem] flex flex-col gap-[1rem]">
                        <h3 class="max-h-[80px] leading-10 text-headline-s font-bold capitalize text-ellipsis overflow-hidden">{{ $news->title }}</h3>
                        <p class="">{{ date_format($news->created_at,"d M Y") }}</p>
                        {{-- <div class="w-fit text-white-100 bg-neutrals-25 rounded-lg">
                            <div class="w-full h-full px-[1.25rem] py-[0.4rem] flex items-center gap-[0.75rem]">
                                <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.5433 8.38058C13.8373 7.99208 14 7.51608 14 7.02083C14 6.23508 13.5608 5.49133 12.8538 5.07658C12.6717 4.96982 12.4645 4.91363 12.2535 4.91383H8.057L8.162 2.76308C8.1865 2.24333 8.00275 1.74983 7.64575 1.37358C7.47055 1.18812 7.25918 1.04057 7.0247 0.94004C6.79022 0.839506 6.53762 0.788126 6.2825 0.789075C5.3725 0.789075 4.5675 1.40158 4.326 2.27833L2.82275 7.72083H2.8175V15.2108H11.0827C11.2437 15.2108 11.4012 15.1793 11.5465 15.1163C12.3795 14.7611 12.9167 13.9473 12.9167 13.0443C12.9167 12.8238 12.8853 12.6068 12.8223 12.3968C13.1163 12.0083 13.279 11.5323 13.279 11.0371C13.279 10.8166 13.2475 10.5996 13.1845 10.3896C13.4785 10.0011 13.6413 9.52508 13.6413 9.02983C13.6378 8.80933 13.6063 8.59058 13.5433 8.38058ZM0 8.28083V14.6508C0 14.9606 0.25025 15.2108 0.56 15.2108H1.6975V7.72083H0.56C0.25025 7.72083 0 7.97108 0 8.28083Z" fill="currentColor"/>
                                </svg>
                                <p class="">{{ $news->likes_count }}</p>
                            </div>
                        </div> --}}
                        <a href={{ "/news/" . $news->slug }} class="text-primary-600 underline">Read article</a>
                        <div class="flex gap-[1rem]">
                            <a href="{{ '/update-news/' . $news->slug }}" class="px-[1rem] py-[0.5rem] bg-primary-300 text-white-100 rounded-lg">Update</a>

                            <form action="/delete-news/{{$news->slug}}" method="POST">
                                @csrf
                                <button type="submit" class="px-[1rem] py-[0.5rem] bg-warning-100 text-white-100 rounded-lg">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    @include('partials.footer')
@endsection
