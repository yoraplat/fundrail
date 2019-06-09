@include('includes.header')
    <body>
    @include('includes.backoffice-nav')
        <div class="container" id="content-container">
            <div class="row">
                <div class="col">
                    <h2>Categories</h2>
                </div>
                <div class="col">
                    <a href="#" data-toggle="modal" data-target="#categoryModal" class="btn btn-primary">Add Category</a>
                </div>
            </div>
            @foreach ($categories as $category)
            <div class="border mb-4">
                
                <div class="row mb-2">
                    <div class="col-12"><h4>{{ $category->name }}</h4></div>
                    <div class="col-6"><a href="{{ route('admin-delete-category', ['id' => $category->id]) }}" class="btn btn-danger">Delete</a></div>
                </div>
            </div>
            @endforeach
            {{ $categories->links() }}
            
            <!-- Modal -->
            <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categorysModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">Create new category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin-add-category') }}" method="post">
                        @csrf
                <div class="modal-body">
                    
                        <div class="form-group">
                            <label for="categoryName">Category Name:</label>
                            <input type="text" id="category" name="category" placeholder="Category">
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add category</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                </form>
                </div>
        </div>
    </body>
</html>
