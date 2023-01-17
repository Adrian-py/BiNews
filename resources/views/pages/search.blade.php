@extends("layout.layout")

@section("title", "Search")

@section("content")
    @include("partials.navbar")
    <section class="pt-[4vh] pb-[2vh] px-hor-mob desktop-s:px-hor">
        <h1 class="text-headline-s font-bold desktop-s:text-headline-l">Find Any News</h1>
        <form class="my-[1rem] flex justify-between gap-[2vw]">
            <input type="search" name="search" class="px-[1rem] border-2 border-neutrals-400 grow" id="search" placeholder="Search">
            <button type="submit" class="w-fit px-[1rem] py-[0.5rem] bg-primary-600 text-white-100">Search</button>
        </form>
        @include("partials.news-list")
    </section>
@endsection
