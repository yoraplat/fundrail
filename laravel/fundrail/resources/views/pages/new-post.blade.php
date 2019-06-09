<html>
<!DOCTYPE=html>
@include('includes.header')
    <body>
    @include('includes.backoffice-nav')
        <div class="container" id="showcase-container">
            <div class="row">
                <div class="col-8"><h2>New Post</h2></div>
            </div>
            <form method="POST" action="{{ route('admin-store-post') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control"  placeholder="Enter title">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" name="content" id="content" placeholder="Enter Content" rows="4"></textarea>
                </div>
                <div class="form-group">
                <label for="image">Add Image</label>
                    <input type="file" name="image" id="image">
                </div>         
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        @include('includes.footer')
    </body>
</html>
