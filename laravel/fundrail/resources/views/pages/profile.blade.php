<html>
<!DOCTYPE=HTML>
@include('includes.header')
    <body>
    @include('includes.nav')
        <div class="container" id="showcase-container">
            <h2>{{ auth()->user()->name }} <h6><label for="credits">Credits on wallet: {{ auth()->user()->credits }}</label></h6></h2>

        <form method="POST" action="{{ route('edit-profile') }}">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Change Email</label>
                    <input type="text" name="email" class="form-control" value="{{ auth()->user()->email }}"  placeholder="Enter title">
                </div>
                              
                <button type="submit" class="btn btn-primary">Save</button>
                
            </form>
        </div>
    </body>
</html>
