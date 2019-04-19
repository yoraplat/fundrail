@include('includes.header')
    <body>
    @include('includes.backoffice-nav')
        <!--
        <a href="{{ route('mail-page') }}">Send welcome mail</a>
        -->

        <div class="container" id="content-container">
            <div class="row">
                <div class="col">
                    <h2>Projects</h2>
                </div>
            </div>
<!--
            <form action="/search" method="POST" role="search">
            {{ csrf_field() }}
                <div class="input-group">
                    <label for="search">Search Projects</label>
                    <input type="text" class="form-control col-6" name="search">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
-->
            @foreach ($projects as $project)
            <div class="border">
                
                <div class="row">
                    <div class="col-12"><h4>{{ $project->title }}</h4></div>
                    <div class="col-3"><h4>Author: {{ $project->name }}</h4></div>
                    <div class="col-3"><a href="/project/{{ $project->projectId }}" class="btn btn-primary">View Project</a></div>
                    <div class="col-3"><a href="{{ route('edit-project', ['projectId' => $project->projectId]) }}" class="btn btn-primary">Edit Project</a></div>
                    <div class="col-3"><a href="{{ route('delete-project', ['projectId' => $project->projectId]) }}" class="btn btn-danger">Delete project</a></div>
                    
                </div>
            </div>
            @endforeach
            {{ $projects->links() }}
            
        </div>
    </body>
</html>
