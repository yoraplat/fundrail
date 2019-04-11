<html>
<!DOCTYPE=HTML>
@include('includes.header')
    <body>
    @include('includes.nav')
        <div class="container" id="showcase-container">
        <div class="row">
            <div class="col-8"><h2>My Projects</h2></div>
            <div class="col-4"><a href="./new-project" class="btn btn-primary" >Create new project</a></div>
        </div>
        
        @foreach ($projects as $project)
            <div class="border">
                <div class="row">
                    <div class="col-6"><h5>{{ $project->title}}</h5></div>
                    <div class="col-3 text-right"><a href="./edit-project/{{ $project->projectId }}" class="btn btn-primary">Edit</a></div>
                    <div class="col-3"><a href="./delete-project/{{ $project->projectId }}" class="btn btn-danger">Delete</a></div>
                </div>
                <div class="row">
                    <div class="col-12"><p>Description {{ $project->description}}</p></div>
                </div>
            </div>
        @endforeach
        {{ $projects->links() }}


            
            
        </div>
    </body>
</html>
