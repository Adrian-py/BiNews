@extends("layout.layout")

@section("title", "Home")

@section("content")
    @include("partials.navbar")

    <main class="w-full flex flex-col">
        @guest
            <section class="relative w-full min-h-[60vh] px-hor-mob flex items-center desktop-s:min-h-fit desktop-s:px-hor desktop-s:py-[5rem]">
                <div class="h-full flex flex-col items-center font-semibold desktop-s:items-start">
                    <p class="text-support-overline text-center desktop-s:text-left">EASILY DISCOVER</p>
                    <h1 class="text-headline-m font-bold text-center desktop-s:text-headline-l desktop-s:text-left">A Reliable Trustworth Source</h1>
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

        @endauth

        <section class="">
            <h4>BINEWS</h4>
            <h2>Read and Keep Up With The Latest News</h2>

            @include("partials.news-list")
        </section>
    </main>

    @include("partials.footer")
@endsection
