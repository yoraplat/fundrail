<html>
<!DOCTYPE=HTML>
@include('includes.header')
    <body>
    @include('includes.nav')
        <div class="container" id="showcase-container">
            <h2>{{ $project->title }}</h2>
            <div class="border">
                <div class="row">
                    <div class="col-12"><p>{{ $project->intro }}</p></div>
                    <div class="col-12"><p>{{ $project->content }}</p></div>
                    
                    <div class="col-12">
                    @foreach($images as $image)
                        <img class="projectPic" src="{{ asset('storage/' . $image) }}" alt="">

                    @endforeach
                    </div>
                    @if(Carbon\Carbon::parse($project->finalTime)->greaterThan(Carbon\Carbon::now()))
                    <div class="col-12">Project funding will end {{ Carbon\Carbon::parse($project->finalTime)->format('d-m-Y h:i:s') }}</div>
                    @else
                    <div class="col-12">Funding ended</div>
                    @endif


                    

                    
                </div>
            </div>
            <h2>Packages</h2>
            <div class="border">
            @foreach ($packages as $package)
            @if(Carbon\Carbon::parse($project->finalTime)->greaterThan(Carbon\Carbon::now()))

            <div class="row">

<!-- Prevent users to fund own projects -->
                    @if ($project->userId == Auth::id())
                    <div class="col-4">{{ $package->title }}</div>
                    <div class="col-4">Price: {{ $package->credit_amount }}</div>
                    <div class="col-4"><a href="{{ route('add-project-funds') }}" class="btn btn-primary disabled" >Own project</a></div>
                    
                    @elseif (null != Auth::check())

                    <div class="col-4">{{ $package->title }}</div>
                        <div class="col">Price: {{ $package->credit_amount }}</div>
                    <form method="POST" action="{{route('add-project-funds') }}">
                        {{ csrf_field() }}
                        
                        <input type="hidden" id="packageId" name="packageId" value="{{$package->packageId}}" >
                        <input type="hidden" id="projectId" name="projectId" value="{{$project->projectId}}" >
                        

                        <div class="col-4"><button class="btn btn-primary" name="form{{ $package->packageId }}">Fund</button></div>
                    </form>
                    
                    
                    @elseif (null == Auth::check())
                    <div class="col-4"><a href="" class="btn btn-primary disabled" >Fund</a></div>
                    @endif  
                </div>
                @else
            <div class="row">
                <div class="col-4">{{ $package->title }}</div>
                <div class="col-4">Price: {{ $package->credit_amount }}</div>
                <div class="col-4"><a href="#" class="btn btn-primary disabled" >Funding ended</a></div>
            </div>
            @endif
            @endforeach
                
           
            </div>
            <div class="border">
            <div class="row">
                <div class="col-12">
                <h2>Comments</h2>
                    @foreach ($comments as $comment)
                    <div class="border">
                        <div class="row">    
                            <div class="col-9">
                                <p>{{ $comment->comment }}</p>
                            </div>
                            <div class="col-3">
                                <p>{{ $comment->name}}</p>
                                <p>{{ $comment->created_at }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                <hr>
                    <form action="{{ route('store-comment') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="comment" id="comment" placeholder="Type a comment"></textarea>
                            <br>
                            <input type="hidden" id="projectId" name="projectId" value="{{$project->projectId}}" >
                            @if (Auth::check())
                            <button class="btn btn-primary" type="submit">Comment</button>
                            @else
                            <button class="btn btn-primary disabled" type="submit">Comment</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>
