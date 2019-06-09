@include('includes.header')
    <body>
    @include('includes.backoffice-nav')
        <div class="container" id="showcase-container">
            <div class="row">
                <div class="col-8"><h2>Edit Post</h2></div>
            </div>
            <form method="POST" action="{{ route('admin-save-post', ['id' => $post->id]) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $post->title }}"  placeholder="Enter title">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" name="content" id="content" placeholder="Enter Content" rows="4">{{ $post->content }}</textarea>
                </div>
                <!--
                <div class="form-group">
                <a href="/delete-image/{{ $image->imageId }}" class="btn btn-danger">Delete Image</a>      
                </div>
                -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        @include('includes.footer')
    </body>
</html>
