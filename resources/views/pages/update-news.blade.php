@extends('layout.layout')

@section('title', 'Home')

@section('content')
    @include('partials.navbar')

    <main class="w-full h-fit px-hor-mob mb-[5vh] flex flex-col items-start justify-start desktop-s:px-[28.125vw] desktop-s:pt-[12vh] desktop:justify-start">
        <form action="/update-news/{{$news->slug}}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-[2rem]">
            @csrf
            <h1 class="mb-[1.5rem] text-headline-m font-bold desktop-s:text-headline-l">Update News Post</h1>

            <div class="flex flex-col gap-[0.5rem]">
                <label for="title" class="text-headline-s font-bold">Title</label>
                <input type="text" name="title" class="w-full mb-[0.5rem] px-[1rem] py-[0.5rem] text-body-l border-2 border-neutrals-200 desktop-s:w-[40vw] desktop-s:py-[0.75rem]" id="title" placeholder="Insert News Title" value="{{$news->title}}">
            </div>
            <div class="flex flex-col gap-[0.5rem]">
                <label for="image" class="text-headline-s font-bold">Image</label>
                <div class="">
                    <input type="file" name="image" class="" id="image">
                </div>
            </div>
            <div class="flex flex-col gap-[0.5rem]">
                <label for="tags" class="text-headline-s font-bold">Tags</label>

                <select multiple name="tags[]" id="tags" class="text-body-l border-2 border-neutrals-50">
                    @foreach ($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col gap-[0.5rem]">
                <label for="content" class="text-headline-s font-bold">Content</label>
                <textarea type="text" name="content" class="w-full h-[25rem] mb-[0.5rem] px-[1rem] py-[0.5rem] text-body-l border-2 border-neutrals-200 desktop-s:w-[40vw] desktop-s:py-[0.75rem]" id="content" placeholder="Insert News Article">{{$news->content}}</textarea>
            </div>

            <button class="px-[1rem] py-[0.5rem] text-headline-s bg-primary-600 text-white-100 rounded-lg">Add</button>

            @if ($errors->any())
                <div>
                    {{ $errors->first() }}
                </div>
            @endif
        </form>
    </main>
@endsection
