@include('includes.header')
    <body>
    @include('includes.backoffice-nav')
        <div class="container" id="content-container">
            <div class="row">
                <div class="col">
                    <h2>Users</h2>
                </div>
            </div>
            @foreach ($users as $user)
            <div class="border mb-4">
                
                <div class="row mb-2">
                    <div class="col-12"><h4>{{ $user->name }}</h4></div>
                    <div class="col-6"><a href="" class="btn btn-primary">View User Projects</a></div>
                    <div class="col-6"><a href="{{ route('admin-delete-user', ['id' => $user->id]) }}" class="btn btn-danger">Delete</a></div>
                </div>
            </div>
            @endforeach
            {{ $users->links() }}
            
        </div>
    </body>
</html>
