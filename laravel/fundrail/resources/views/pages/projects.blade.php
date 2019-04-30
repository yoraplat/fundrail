<!doctype=html>
<html lang="{{ app()->getLocale() }}">
@include('includes.header')

    <body>
    @include('includes.nav')

        <div class="container" id="showcase-container">
            <h2>All Projects</h2>
            @foreach ($projects as $project)
            
            <div class="border">
                <div class="row">
                    <div class="col-6"><h5>{{ $project->title}}</h5></div>
                    <div class="col-6 text-right"><a href="./project/{{ $project->id }}" class="btn btn-primary">Get to know</a></div>
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
