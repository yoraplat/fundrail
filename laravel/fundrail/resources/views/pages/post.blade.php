<html>
<!DOCTYPE=HTML>
@include('includes.header')
    <body>
    @include('includes.nav')
        <div class="container" id="showcase-container">
            <h2>{{ $post->title }}</h2>
            <div class="border">
                <div class="row">
                    <div class="col-12"><h3>{{ $post->content }}</h3></div>
                    <div class="col-12"><p>{{ $post->created_at }}</p></div>
                    <div class="col-12"><img src="{{ asset('storage/') . $post->image_path }}" alt=""></div>
                </div>
            </div>
        </div>
        @include('includes.footer')
    </body>
</html>
