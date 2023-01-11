<div class="">
    @foreach ($news_list as $news)
        <div class="">
            <img src="{{ asset('storage/images/' . $news->image) }}" alt="{{ $news->title }}">
            <h3>{{ $news->title }}</h3>
            <p class="">{{ $news->created_at }}</p>

            <a href={{ "/news/" . $news->slug }} class="underline">Read article</a>
        </div>
    @endforeach
</div>
