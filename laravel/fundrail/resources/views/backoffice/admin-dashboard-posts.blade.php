@include('includes.header')
    <body>
    @include('includes.backoffice-nav')
        <div class="container" id="content-container">
            <div class="row">
                <div class="col">
                    <h2>Posts</h2>
                    <a href="{{ route('admin-new-post') }}" class="btn btn-primary">Create new post</a>
                </div>
            </div>
            @foreach ($posts as $post)
            <div class="border">
                
                <div class="row">
                    <div class="col-12"><h4>{{ $post->title }}</h4></div>
                    <div class="col-3"><h4>Author: {{ $post->name }}</h4></div>
                    <div class="col-3"><a href="./edit-post/{{ $post->postId }}" class="btn btn-primary">Edit Post</a></div>
                    <div class="col-3"><a href="./delete-post/{{ $post->postId }}" class="btn btn-danger">Delete Post</a></div>
                    
                </div>
            </div>
            @endforeach
            {{ $posts->links() }}
            
        </div>
    </body>
</html>
