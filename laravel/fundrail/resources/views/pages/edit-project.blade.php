<html>
<!DOCTYPE=html>
@include('includes.header')
    <body>
    @include('includes.nav')
        <div class="container" id="showcase-container">
            <div class="row">
                <div class="col-8"><h2>New Project</h2></div>
            </div>
            <form method="POST" action="{{ route('save-project', ['id' => $project->id]) }}">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control"  placeholder="Enter title" value="{{ $project->title }}" readonly>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" placeholder="Enter Description" rows="4" >{{ $project->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="intro">Introduction</label>
                    <textarea class="form-control" name="intro" placeholder="Enter Introduction" rows="4">{{ $project->intro }}</textarea>
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control"  name="content" placeholder="Enter Content" rows="6">{{ $project->content }}</textarea>
                </div>

                <div class="form-group">
                    <label for="images" class="btn btn-secondary">Add Images</label>
                    @foreach ($images as $image)
                    <a href="/delete-image/{{ $image->imageId }}" class="btn btn-danger">Delete image {{ $image->imageId }}</a>
                    @endforeach
                </div>
                
                <div class="form-group">
                    <label for="credits" >Funding Goal</label>
                    <input type="text" class="form-control" name="credits" placeholder="Credit Amount" value="{{ $project->credit_goal }}">
                </div>
                
                <div class="form-group">
                    <label for="time">Funding Ends On</label>
                    <input type="date" class="form-control" name="time" placeholder="time" value="" readonly>
                </div>
                
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </body>
</html>
