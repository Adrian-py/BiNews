@extends("layout.layout")

@section("title", "Home")

@section("content")
    @include("partials.navbar")
    <main class="w-full flex flex-col">
        @guest
            <section class="w-full h-fit">
                <div class="font-semibold">
                    <p class="text-support-overline">EASILY DISCOVER</p>
                    <h1 class="text-headline-m font-bold desktop-s:text-headline-l">A Reliable Trustworth Source</h1>
                    <a href="/login" class="px-[1.5rem] py-[1rem] text-white-100 text-label-s bg-secondary-600 rounded-lg">START READING</a>
                </div>
            </section>
        @endguest
    </main>
@endsection
