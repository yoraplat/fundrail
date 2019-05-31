    @include('includes.header')
    <body>
    @include('includes.nav')
        <!--
        <a href="{{ route('mail-page') }}">Send welcome mail</a>
        -->

        <div class="container" id="content-container">
            <div class="row">
                <div class="col">
                    <h2>Start exploring projects or pitch your own idea</h2>
                </div>
            </div>

            <div class="row actions">
                <div class="col-4 text-center"><a href="{{ route('new-project') }}" class="btn btn-primary">Get your project funded</a></div>
                <div class="col-4 text-center"><a href="/projects" class="btn btn-secondary">Browse current projects</a></div>
            </div>

        </div>
        
        <div class="container" id="showcase-container">
        
            @foreach ($projects as $project)
            <div class="border">
                <div class="row">
                    <div class="col-6"><h5>{{ $project->title}}</h5></div>
                    <div class="col-3"><p>Author: {{ $project->name}}</p></div>
                    <div class="col-3"><a href="{{ route('projectById', ['id' => $project->projectId]) }}" class="btn btn-primary">Get to know</a></div>
                </div>
                <div class="row">
                    <div class="col-12"><p>Description {{ $project->description}}</p></div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="container" id="showcase-container">
            <h2>News</h2>
            @foreach($news as $post)
            <div class="border">
            <div class="row">
                <div class="col"><h4>{{ $post->title }}</h4></div>
            </div>
            <div class="row">
                <div class="col">{{ $post->content }}</div>
                <!--
                <div class="col"><img src="{{ asset('storage/' ) }}" alt=""></div>
                -->
            </div>
            <div class="row">
                <div class="col"><a href="#" class="btn btn-primary" >Read More</a></div>
            </div>
        </div>
        @endforeach

        </div>
    </body>
</html>
