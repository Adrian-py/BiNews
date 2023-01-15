@extends("layout.layout")

@section("title", "{{$tag->name}}")

@section("content")
    @include("partials.navbar")
    <section class="pt-[4vh] pb-[2vh] px-hor-mob desktop-s:px-hor">
        <h1 class="mb-[1rem] text-headline-s font-bold desktop-s:text-headline-l capitalize">{{$tag->name}} News</h1>
        @include("partials.news-list")
    </section>
@endsection
