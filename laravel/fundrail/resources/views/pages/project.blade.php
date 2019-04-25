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
            <div class="row">
                    <div class="col-4">{{ $package->title }}</div>
                    <div class="col-4">Price: {{ $package->credit_amount }}</div>
                    
                    <!--
                    @if ($project->user_id == $project->userId)
                    <div class="col-4"><a href="{{ route('add-project-funds') }}" class="btn btn-primary disabled" >Own project</a></div>
                    @elseif (null != Auth::check())
                    <div class="col-4"><a href="{{ route('add-project-funds') }}" class="btn btn-primary">Fund</a></div>
                    @elseif (null == Auth::check())
                    <div class="col-4"><a href="{{ route('add-project-funds') }}" class="btn btn-primary disabled" >Fund</a></div>
                    @endif

                    DON'T FUND OWN PROJECTS
                    -->   


                    <!--
                    Controller is only taking first package price
                    -->

                    @if (null != Auth::check())
                    
                    <form method="POST" action="{{route('add-project-funds') }}">
                        {{ csrf_field() }}
                        
                        <input type="hidden" id="packageId" name="packageId" value="{{$package->packageId}}" >
                        <input type="hidden" id="projectId" name="projectId" value="{{$project->projectId}}" >
                        <div class="col-4"><button class="btn btn-primary" name="form{{ $package->packageId }}">Fund</button></div>
                        @isset($message)
                        <div class="col-4">{{ $message }}</div>
                        @endisset
                    </form>
                    
                    
                    @elseif (null == Auth::check())
                    <div class="col-4"><a href="" class="btn btn-primary disabled" >Fund</a></div>
                    @endif  
                </div>
                @endforeach
                
            </div>
        </div>
    </body>
</html>
