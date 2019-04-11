<html>
<!DOCTYPE=html>
@include('includes.header')
    <body>
    @include('includes.nav')
        <div class="container" id="showcase-container">
            <div class="row">
                <div class="col-8"><h2>New Project</h2></div>
            </div>
            <form method="POST" action="{{ route('post-new-project') }}">
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
                    <label for="intro">Introduction</label>
                    <textarea class="form-control" name="intro" placeholder="Enter Introduction" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control"  name="content" placeholder="Enter Content" rows="6"></textarea>
                </div>

                <div class="form-group">
                    <label for="images" class="btn btn-secondary">Add Images</label>
                </div>
                
                <div class="form-group">
                    <label for="credits" >Funding Goal</label>
                    <input type="text" class="form-control" name="credits" placeholder="Credit Amount">
                </div>
                
                <div class="form-group">
                    <label for="time">Funding Ends On</label>
                    <input type="date" class="form-control" name="time" placeholder="time">
                </div>
                
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category">
                        <option value="1">CAT1</option>
                        <option value="2">CAT2</option>
                        <option value="3">CAT3</option>
                        <option value="4">CAT4</option>
                    </select>
                </div>

                <h1>ADD PACKAGES</h1>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </body>
</html>
