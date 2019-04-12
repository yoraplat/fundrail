<html>
<!DOCTYPE=html>
@include('includes.header')
    <body>
    @include('includes.nav')
    @include('includes.subnav')
        <div class="container" id="showcase-container">
            <div class="row">
                <div class="col-8"><h2>Edit Package</h2></div>
            </div>
            <form method="POST" action="{{ route('save-package', ['id' => $package->id]) }}">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $package->title }}"  placeholder="Enter title">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" placeholder="Enter Description" rows="4">{{ $package->description }}</textarea>
                </div>                
                <div class="form-group">
                    <label for="credits" >Price</label>
                    <input type="text" class="form-control" name="credits" id="credits" value="{{ $package->credit_amount }}" placeholder="Credit Amount">
                </div>
                
                <div class="form-group">
                    <label for="projectId">Package for:</label>
                    <select name="projectId" id="projectId">
                        <option value="1">Project 1</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </body>
</html>
