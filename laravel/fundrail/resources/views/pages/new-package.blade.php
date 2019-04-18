<html>
<!DOCTYPE=html>
@include('includes.header')
    <body>
    @include('includes.nav')
    @include('includes.subnav')
        <div class="container" id="showcase-container">
            <div class="row">
                <div class="col-8"><h2>New Package</h2></div>
            </div>
            <form method="POST" action="{{ route('post-new-package') }}">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control"  placeholder="Enter title">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" placeholder="Enter Description" rows="4"></textarea>
                </div>                
                <div class="form-group">
                    <label for="credits" >Price</label>
                    <input type="text" class="form-control" name="credits" id="credits" placeholder="Credit Amount">
                </div>
                
                <div class="form-group">
                    <label for="projectId">Package for:</label>
                    <select name="projectId" id="projectId">
                    @foreach ($projects as $project)
                        <option value="{{ $project->projectId }}">{{ $project->title }}</option>
                    @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </body>
</html>
