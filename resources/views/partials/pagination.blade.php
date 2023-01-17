<div class="my-[1rem] w-full flex justify-between desktop-s:w-1/2 desktop-s:mx-auto">
    <a href="{{ $news_list->previousPageUrl() }}" class="w-[20vw] py-[0.5rem] text-center bg-secondary-600 text-white-100 rounded-lg desktop-s:w-1/6">Previous</a>
    <div class="flex items-center gap-[6vw]">
        @if($news_list->currentPage() > 6)
            @for($i = 1; $i <= 3; $i++)
                <a class="text-body-l font-bold" href="{{ $news_list->url($i) }}">{{ $i }}</a>
            @endfor
            <p>...</p>
        @endif

        @for($i = $news_list->currentPage()-3; $i < $news_list->currentPage(); $i++)
            @if($i >0)
                <a class="text-body-l font-bold" href="{{ $news_list->url($i) }}">{{ $i }}</a>
            @endif
        @endfor

        @for($i = $news_list->currentPage(); $i <= $news_list->lastPage() && $i<=$news_list->currentPage()+3; $i++)
            <a class="text-body-l font-bold" href="{{ $news_list->url($i) }}">{{ $i }}</a>
        @endfor
    </div>
    <a href="{{ $news_list->nextPageUrl() }}" class="w-[20vw] py-[0.5rem] text-center bg-secondary-600 text-white-100 rounded-lg  desktop-s:w-1/6">Next</a>
</div>
