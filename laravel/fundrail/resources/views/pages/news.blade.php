@include('includes.header')
    <body>
    @include('includes.nav')
        <!--
        <a href="{{ route('mail-page') }}">Send welcome mail</a>
        -->

        <div class="container" id="content-container">
            <div class="row">
                <div class="col">
                    <h2>Find out all our news here</h2>
                </div>
            </div>

        </div>
        

        <div class="container" id="showcase-container">
            <h2>Latest posts</h2>
            @foreach($news as $post)
            <div class="border">
            <div class="row">
                <div class="col"><h4>{{ $post->title }}</h4></div>
            </div>
            <div class="row">
                <div class="col">{{ $post->content }}</div>
                
                <div class="col"><img src="{{ asset('storage/') . $post->image_path }}" alt=""></div>
                
            </div>
            <div class="row">
                <div class="col"><a href="/news/{{ $post->id }}" class="btn btn-primary" >Read More</a></div>
            </div>
        </div>
        @endforeach

        </div>
        @include('includes.footer')
    </body>
</html>
