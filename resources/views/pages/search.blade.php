@extends("layout.layout")

@section("title", "Search")

@section("content")
    @include("partials.navbar")
    <section class="pt-[4vh] pb-[2vh] px-hor-mob desktop-s:px-hor">
        <h1 class="mb-[1rem] text-headline-s font-bold desktop-s:text-headline-l">Find Any News</h1>
        <form class="">
            <div class="flex">
                <input type="search" name="search" class="" id="search" placeholder="Search">
            </div>
            <div class="">
                <button type="submit" class="">Search</button>
            </div>
        </form>
        @include("partials.news-list")
    </section>
@endsection
