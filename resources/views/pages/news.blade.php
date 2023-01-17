@extends('layout.layout')

@section('title', 'Home')

@section('content')
    @include('partials.navbar')

    <main class="w-full flex flex-col px-hor-mob gap-[6vw] desktop-s:flex-row desktop-s:px-hor desktop-s:py-[2.5rem]">
        <section class="w-2/3">
            <h1 class="text-headline-m font-bold desktop-s:text-headline-l capitalize desktop-s:text-headline-l">{{ $news->title }}</h1>

            <img src="{{ asset('storage/images/' . (!$news->image ? $news->newsTags->first()->name . '-placeholder.jpg' : $news->image)) }}" alt="{{ $news->title }}" class="w-full h-[28rem] mb-[1.5rem] object-cover">

            <p class="mb-[1.5vh]">{{ date_format($news->created_at, 'd M Y') }}. by {{ $news->user->name }}</p>
            <div class="w-full flex gap-2 pb-4 flex-wrap">
                @foreach ($news->newsTags as $tags)
                    <a href="{{ '/tag/' . $tags->id }}" class="px-[1rem] py-2 text-white-100 bg-secondary-600 rounded-lg">
                        {{ $tags->name }}
                    </a>
                @endforeach
            </div>

            <form action="{{ '/likes/' . $news->slug }}" method="POST" class="w-fit text-white-100 @if($user_liked)bg-primary-600 @else bg-neutrals-25 @endif rounded-lg">
                @csrf

                <button type="submit" class="w-full h-full px-[1.25rem] py-[0.4rem] flex items-center gap-[0.75rem]">
                    <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.5433 8.38058C13.8373 7.99208 14 7.51608 14 7.02083C14 6.23508 13.5608 5.49133 12.8538 5.07658C12.6717 4.96982 12.4645 4.91363 12.2535 4.91383H8.057L8.162 2.76308C8.1865 2.24333 8.00275 1.74983 7.64575 1.37358C7.47055 1.18812 7.25918 1.04057 7.0247 0.94004C6.79022 0.839506 6.53762 0.788126 6.2825 0.789075C5.3725 0.789075 4.5675 1.40158 4.326 2.27833L2.82275 7.72083H2.8175V15.2108H11.0827C11.2437 15.2108 11.4012 15.1793 11.5465 15.1163C12.3795 14.7611 12.9167 13.9473 12.9167 13.0443C12.9167 12.8238 12.8853 12.6068 12.8223 12.3968C13.1163 12.0083 13.279 11.5323 13.279 11.0371C13.279 10.8166 13.2475 10.5996 13.1845 10.3896C13.4785 10.0011 13.6413 9.52508 13.6413 9.02983C13.6378 8.80933 13.6063 8.59058 13.5433 8.38058ZM0 8.28083V14.6508C0 14.9606 0.25025 15.2108 0.56 15.2108H1.6975V7.72083H0.56C0.25025 7.72083 0 7.97108 0 8.28083Z" fill="currentColor"/>
                    </svg>
                    <p class="">{{ $news->likes_count }}</p>
                </button>
            </form>

            <p class="w-full my-[1.5rem] text-justify text-body-l">{{ $news->content }}</p>
        </section>

        <div class="w-1/3 relative">
            <div class="sticky top-[1rem]">
                <h1 class="mb-[1rem] text-headline-m text-right font-bold">Latest News</h1>
                <div class="flex flex-col gap-4">
                    @foreach ($latest_news as $news)
                        <div class="px-6 py-8 border-2 border-neutrals-25/5">
                            <h1 class="text-headline-s font-bold capitalize">{{ $news->title }}</h1>
                            <p class="py-3 font-semibold">{{ date_format($news->created_at, 'd M Y') }}</p>
                            <a href={{ '/news/' . $news->slug }} class="text-primary-600 underline">Read article</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>

    @include('partials.footer')
@endsection
