<html>
<!DOCTYPE=HTML>
@include('includes.header')
    <body>
    @include('includes.nav')
        <div class="container" id="showcase-container">
            <h2>{{ $project->title}}</h2>
            <div class="border">
                <div class="row">
                    <div class="col-12"><p>{{ $project->intro}}</p></div>
                    <div class="col-12"><p>{{ $project->content}}</p></div>
                    
            
            
                    
                    <div class="col-12 text-right">Already funded: </div>
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

                    @if (null != Auth::check())
                    
                    <form method="POST" action="{{route('add-project-funds') }}">
                        {{ csrf_field() }}
                        <input type="hidden" id="packageId" name="packageId" value="{{$package->packageId}}" >
                        <div class="col-4"><button class="btn btn-primary">Fund</button></div>
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
