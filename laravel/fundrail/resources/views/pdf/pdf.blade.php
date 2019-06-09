<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project</title>
    <link href = "{{ asset('/css/app.css') }}" rel="stylesheet" />
        <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>

    <div class="container" id="showcase-container">
            <h2>{{ $project->title }}</h2>
            <div class="border">
                <div class="row">
                    <div class="col-12"><h3>{{ $project->intro }}</h3></div>
                    <div class="col-12"><p>{{ $project->content }}</p></div>
                    
                    <div class="col-12">
                    @foreach($project->project_images as $image)
                        <img class="projects-thumbnail" src="{{ asset('storage/'). '/' . $image->path = str_replace('img/', '', $image->path) }}" alt="">
                    @endforeach
                    


                    

                    
                </div>
            </div>
</body>
</html>