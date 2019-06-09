    @include('includes.header')
    <body>
    @include('includes.nav')
        
        <!-- <a href="{{ route('welcome-mail') }}">Send welcome mail</a> -->
       

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

        <div class="container-fluid">
            
            <div class="row">
            @foreach ($projects as $project)
                <div class="col-6 mt-3">
                    <div class="card mb-4">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                            @foreach($project->project_images as $image)
                                    <img class="projects-thumbnail" src="{{ asset('storage/'). '/' . $image->path = str_replace('img/', '', $image->path) }}" alt="">
                                    @endforeach
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">{{ $project->title}}</h4>
                                <p class="card-text">{{$project->intro}}</p>
                                <p class="card-text">{{$project->description}}</p>
                                <a class="btn btn-primary float-right projects-button" href="{{ route('projectById', ['id' => $project->projectId]) }}">Get to know</a>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Project created on {{ $project->created_at }} by {{ $project->name}}</small>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
        
        </div>

        <div class="container" id="showcase-container">
            <h2>News</h2>

           
            <div class="container-fluid">
            
            <div class="row">
            @foreach($news as $post)
                <div class="col-6 mt-3">
                    <div class="card mb-4">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                    <img class="projects-thumbnail" src="{{ asset('storage/') . $post->image_path }}" alt="">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">{{ $post->title}}</h4>
                                <p class="card-text">{{$post->content}}</p>
                                <a class="btn btn-primary float-right projects-button" href="/news/{{ $post->id }}">Read More</a>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Post created on {{ $post->created_at }}</small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            
        </div>
    

        </div>
        @include('includes.footer')
    </body>
</html>
