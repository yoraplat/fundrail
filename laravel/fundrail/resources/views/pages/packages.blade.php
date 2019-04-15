<html>
<!DOCTYPE=HTML>
@include('includes.header')
    <body>
    @include('includes.nav')
    @include('includes.subnav')
        <div class="container" id="showcase-container">
        <div class="row">
            <div class="col-8"><h2>My Packages</h2></div>
            <div class="col-4"><a href="./new-package/" class="btn btn-primary">Create Package</a></div>
        </div>
            @foreach ($packages as $package)
            <div class="border">
                <div class="row">
                    <div class="col-6"><h5>{{ $package->title }}</h5></div>
                    <div class="col-3 text-right"><a href="./edit-package/{{ $package->packageId }}" class="btn btn-primary">Edit</a></div>
                    <div class="col-3"><a href="./delete-package/{{ $package->packageId }}" class="btn btn-danger">Delete</a></div>
                </div>
                <div class="row">
                    <div class="col-12"><p>{{ $package->description }} </p></div>
                </div>
            </div>
            @endforeach
        </div>
    </body>
</html>
