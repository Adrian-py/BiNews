<div class="grid grid-cols-1 gap-[2.5rem] desktop-s:grid-cols-3">
    @foreach ($news_list as $news)
        <div>
            @if(!$news->image)
                <img src="{{ asset("storage/images/" . $news->newsTags->first()->name . "-placeholder.jpg") }}" alt="" class="w-full h-[16rem] object-cover">
            @else
                <img src="{{ asset('storage/images/' . $news->image) }}" alt="{{ $news->title }}">
            @endif

            <div class="px-[5.26%] py-[1rem] flex flex-col gap-[1rem]">
                <h3 class="h-[84px] leading-10 text-headline-s font-bold capitalize text-ellipsis overflow-hidden">{{ $news->title }}</h3>
                <p class="">{{ date_format($news->created_at,"d M Y") }}</p>

                <a href={{ "/news/" . $news->slug }} class="text-primary-600 underline">Read article</a>
            </div>
        </div>
    @endforeach
</div>
