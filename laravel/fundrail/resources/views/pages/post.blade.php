<html>
<!DOCTYPE=HTML>
@include('includes.header')
    <body>
    @include('includes.nav')
        <div class="container" id="showcase-container">
            <h2>{{ $post->title }}</h2>
            <small class="ml-2">{{ $post->created_at }}</small>
            
            <div class="border">
                <div class="row">
                    <div class="col-12"><h3>{{ $post->content }}</h3></div>
                    <div class="col-12"><img class="postImg" src="{{ asset('storage/') . $post->image_path }}" alt=""></div>
                </div>
            </div>
        </div>
        @include('includes.footer')
    </body>
</html>
