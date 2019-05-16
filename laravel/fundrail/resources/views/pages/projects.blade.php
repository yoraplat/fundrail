<!doctype=html>
<html lang="{{ app()->getLocale() }}">
@include('includes.header')

    <body>
    @include('includes.nav')

        <div class="container" id="showcase-container">
            <div class="row">
                <div class="col"><h2>All Projects</h2></div>
                <div class="col">
                    <form action="{{ route('search-project') }}" method="POST">
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
