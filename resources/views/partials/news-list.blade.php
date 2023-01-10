<section class="">
    <h4>BINEWS</h4>
    <h2>Read and Keep Up With The Latest News</h2>

    @foreach ($news_list as $news)
        <div class="">
            <img src="{{ asset('storage/images/' . $news->image) }}" alt="{{ $image->name }}">
        </div>
    @endforeach
</section>
