
    <div>
        <form action="/add-news" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <h1>Create News Post</h1>
            </div>
            <div class="">
                <label for="title">Title</label>
                <div class="">
                    <input type="text" name="title" class="" id="title" placeholder="Insert News Title">
                </div>
            </div>
            <div class="">
                <label for="image">Image</label>
                <div class="">
                    <input type="file" name="image" class="" id="image">
                </div>
            </div>
            <div class="">
                <label for="tags">Tags</label>
                <div class="">
                    <select multiple name="tags[]" id="tags">
                        @foreach ($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="">
                <label for="content">Content</label>
                <div class="">
                    <textarea type="text" name="content" class="" id="content" placeholder="Insert News Article"></textarea>
                </div>
            </div>
            <div class="">
                <div class="">
                    <button class="btn btn-danger">Add</button>
                </div>
            </div>
            @if ($errors->any())
                <div>
                    {{ $errors->first() }}
                </div>
            @endif
        </form>
    </div>

