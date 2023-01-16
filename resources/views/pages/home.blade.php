@extends("layout.layout")

@section("title", "Home")

@section("content")
    @include("partials.navbar")

    <main class="w-full flex flex-col">
        @guest
            <section class="relative w-full min-h-[60vh] px-hor-mob flex justify-between items-center desktop-s:min-h-fit desktop-s:px-hor desktop-s:py-[5rem]">
                <div class="h-full flex flex-col items-center font-semibold desktop-s:items-start">
                    <p class="text-support-overline text-center desktop-s:text-left">EASILY DISCOVER</p>
                    <h1 class="text-headline-m font-bold text-center desktop-s:text-headline-l desktop-s:text-left">A Reliable<br>Trustworth Source</h1>
                    <a href="/login" class="px-[1.5rem] py-[1rem] text-white-100 text-label-s text-center bg-secondary-600 rounded-lg">START READING</a>
                </div>

                <img src="{{ asset('images/welcome-page.jpg') }}" alt="Welcome Page Image" class="absolute top-0 left-0 w-full h-full z-[-2] desktop-s:relative desktop-s:w-[44.4vw] desktop-s:h-auto">
                <div class="absolute top-0 left-0 w-full h-full bg-white-80 z-[-1] desktop-s:hidden"></div>
            </section>

            <section class="h-[50vh] px-hor-mob flex flex-col justify-center items-center bg-primary-900 text-white-100 desktop-s:px-hor">
                <h2 class="mb-[1.5rem] text-headline-s font-bold desktop-s:text-headline-l">Start Reading Today!</h2>
                <p class="mb-[2.5rem] text-body-l text-center">Find trustworthy and latest news on topics that is currently viral or you are interested in at <br>the moment! Sign up and start reading!</p>
                <a href="/login" class="px-[1.5rem] py-[1rem] text-label-s font-bold bg-secondary-300 rounded-lg">START READING</a>
            </section>
        @endguest

        @auth
            <section class="px-hor-mob pt-[4vh] pb-[2vh] desktop-s:px-hor">
                <h1 class="mb-[1rem] text-headline-m font-bold desktop-s:text-headline-l">Top News</h1>
                <a class="relative min-h-[25rem] pl-[5.556vw] pb-[5rem] flex flex-col justify-end text-white-100 font-bold desktop-s:min-h-[35rem]" href="{{ "/news/" . $headline_news->slug }}">
                    <img src="{{ asset('storage/images/' . (!$headline_news->image ? $headline_news->newsTags->first()->name . '-placeholder.jpg' : $headline_news->image)) }}" alt="{{ $headline_news->title }}" class="absolute top-[0] left-[0] w-full h-full z-[-2] object-cover">

                    <p class="text-headline-xs">{{ date_format($headline_news->created_at,"d M Y") }}</p>
                    <h2 class="mb-[1rem] text-headline-s capitalize desktop-s:text-headline-l">{{ $headline_news->title }}</h2>

                    <div class="w-fit text-neutrals-400 bg-white-100 rounded-lg">
                        <div class="w-full h-full px-[1.25rem] py-[0.4rem] flex items-center gap-[0.75rem]">
                            <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.5433 8.38058C13.8373 7.99208 14 7.51608 14 7.02083C14 6.23508 13.5608 5.49133 12.8538 5.07658C12.6717 4.96982 12.4645 4.91363 12.2535 4.91383H8.057L8.162 2.76308C8.1865 2.24333 8.00275 1.74983 7.64575 1.37358C7.47055 1.18812 7.25918 1.04057 7.0247 0.94004C6.79022 0.839506 6.53762 0.788126 6.2825 0.789075C5.3725 0.789075 4.5675 1.40158 4.326 2.27833L2.82275 7.72083H2.8175V15.2108H11.0827C11.2437 15.2108 11.4012 15.1793 11.5465 15.1163C12.3795 14.7611 12.9167 13.9473 12.9167 13.0443C12.9167 12.8238 12.8853 12.6068 12.8223 12.3968C13.1163 12.0083 13.279 11.5323 13.279 11.0371C13.279 10.8166 13.2475 10.5996 13.1845 10.3896C13.4785 10.0011 13.6413 9.52508 13.6413 9.02983C13.6378 8.80933 13.6063 8.59058 13.5433 8.38058ZM0 8.28083V14.6508C0 14.9606 0.25025 15.2108 0.56 15.2108H1.6975V7.72083H0.56C0.25025 7.72083 0 7.97108 0 8.28083Z" fill="currentColor"/>
                            </svg>

                            <p class="">{{ $headline_news->likes_count }}</p>
                        </div>
                    </div>

                    {{-- Overlay --}}
                    <div class="absolute top-[0] left-[0] w-full h-full bg-neutrals-400/60 z-[-1]"></div>
                </a>
            </section>
        @endauth

        <section class="py-[2.5rem] px-hor-mob desktop-s:px-hor">
            <h4 class="mb-[1rem] text-neutrals-200 text-support-overline">BINEWS</h4>
            <h2 class="mb-[3rem] text-headline-s font-bold desktop-s:text-headline-l">Read and Keep Up With<br>The Latest News</h2>

            @include("partials.news-list")
        </section>
    </main>

    @include("partials.footer")
@endsection
