<!doctype=html>
<html lang="{{ app()->getLocale() }}">
@include('includes.header')

    <body>
    @include('includes.nav')

        <div class="container" id="showcase-container">
            
                <div class="col"><h2>All Projects</h2></div>
                <div class="row">
                <div class="col">
                    <form action="{{ route('search-project') }}" method="POST" class="">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="search" id="search" placeholder="Search">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                        <div class="form-group">
                        <label for="orderBy">Order by:</label>
                            <select name="orderBy" id="orderBy">
                                <option value="title">Project Title</option>
                                <option value="final_time">Date</option>
                                <option value="category_id">Category</option>
                            </select>

                            <select name="order" id="order">
                                <option value="ASC">Ascending</option>
                                <option value="DESC">Descending</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            
            
            <div class="container-fluid">
            
    <div class="row">
    @foreach ($projects as $project)
        <div class="col-6 mt-3">
            <div class="card mb-4">
                <div class="card-horizontal">
                    
                    <div class="card-body">
                        <h4 class="card-title">{{ $project->title}}</h4>
                        <p class="card-text">{{$project->intro}}</p>
                        <p class="card-text">{{$project->description}}</p>
                        <a class="btn btn-primary projects-button" href="/project/{{ $project->id }}">Get to know</a>
                    </div>

                    <div class="img-square-wrapper">
                    @foreach($project->project_images as $image)
                        <img class="projects-thumbnail" src="{{ asset('storage/'). '/' . $image->path = str_replace('img/', '', $image->path) }}" alt="">
                    @endforeach
                    </div>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Project created on {{ $project->created_at }}</small>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
{{ $projects->links() }}
            
            
            
        </div>
        @include('includes.footer')
    </body>
</html>
