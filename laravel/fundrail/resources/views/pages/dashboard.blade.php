<html>
<!DOCTYPE=HTML>
@include('includes.header')
    <body>
    @include('includes.nav')
    @include('includes.subnav')
        <div class="container" id="showcase-container">
        <div class="row">
            <div class="col-8"><h2>My Projects</h2></div>
            <div class="col-4"><a href="./new-project" class="btn btn-primary" >Create new project</a></div>
        </div>
        
        @foreach ($projects as $project)
            <div class="border">
                <div class="row">
                    <div class="col"><h5>{{ $project->title}}</h5></div>
                    <div class="col"><a href="./project/{{ $project->projectId }}" class="btn btn-primary">View Project</a></div>
                    <div class="col"><a href="" class="btn btn-primary">View Funders</a></div>
                    <div class="col"><a href="./edit-project/{{ $project->projectId }}" class="btn btn-primary">Edit</a></div>
                    <div class="col"><a href="./delete-project/{{ $project->projectId }}" class="btn btn-danger">Delete</a></div>
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
