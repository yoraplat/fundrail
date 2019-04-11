<html>
<!DOCTYPE=HTML>
@include('includes.header')
    <body>
    @include('includes.nav')
        <div class="container" id="showcase-container">
            <h2>{{ $project->title}}</h2>
            <div class="border">
                <div class="row">
                    <div class="col-12"><p>{{ $project->intro}}</p></div>
                    <div class="col-12"><p>{{ $project->content}}</p></div>
                </div>
            </div>
        </div>
    </body>
</html>
