<html>
<!DOCTYPE=HTML>
@include('includes.header')
    <body>
    @include('includes.nav')
    @include('includes.subnav')
        <div class="container" id="showcase-container">
            <h2>My funds</h2>
            <div class="border">
                <div class="row">
                    <div class="col-12"><p>My total credits: {{ $funds->credits }} </p></div>
                </div>
            </div>

            <form method="POST" action="{{route('add-funds')}}">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="funds">Amount of credits to add</label>
                    <input type="text" name="funds" class="form-control"  placeholder="Amount">
                </div>
                <button type="submit" class="btn btn-primary">Add funds</button>
            </form>
            <h2>Funded Projects</h2>
            <div class="border">
            @foreach ($fundedProjects as $fundedProject)
                <div class="row">
                    <div class="col-8"><p>{{ $fundedProject->packageTitle }} funded to {{ $fundedProject->projectTitle}} for {{ $fundedProject->packageCredits}} credits</p></div>
                    <div class="col-4"><a href="./project/" class="btn btn-primary">View project</a></div>
                </div>
                @endforeach
            </div>

        </div>
    </body>
</html>
