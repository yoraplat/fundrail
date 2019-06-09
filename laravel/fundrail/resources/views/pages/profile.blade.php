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

                <div class="form-group">
                    <label for="password">Current Password <small>(Required to save changes)</small></label>
                    <input type="password" name="current" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="new">New Password <small>(Optional)</small></label>
                    <input type="password" name="new" class="form-control">
                </div>
                              
                <button type="submit" class="btn btn-primary">Save</button>
                
            </form>
        </div>
        @include('includes.footer')
    </body>
</html>
