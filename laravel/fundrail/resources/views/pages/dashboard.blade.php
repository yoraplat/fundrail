<html>
<!DOCTYPE=HTML>
@include('includes.header')
    <body>
    @include('includes.nav')
    @include('includes.subnav')
        <div class="container" id="showcase-container">
        <div class="row">
            <div class="col-8"><h2>My Projects</h2></div>
            <div class="col-4"><a href="./new-project" class="btn btn-primary" >Create new project</a></div>
        </div>
        
        @foreach ($projects as $project)
            <div class="border">
                <div class="row">
                    <div class="col"><h5>{{ $project->title}}</h5></div>
                    <div class="col"><a href="./project/{{ $project->id }}" class="btn btn-primary">View Project</a></div>
                    <div class="col"><a href="" data-toggle="modal" data-target="#fundersModal{{ $project->id }}" class="btn btn-primary">Funders</a></div>
                    <div class="col"><a href="./edit-project/{{ $project->id }}" class="btn btn-primary">Edit</a></div>
                    <div class="col"><a href="./delete-project/{{ $project->id }}" class="btn btn-danger">Delete</a></div>
                </div>
                
                <div class="row">
                    <div class="col-12"><p>Description {{ $project->description}}</p></div>
                </div>  
            </div>
        @endforeach
        
        @foreach($projects as $project)

         <!-- Funders Modal -->
         <div class="modal fade" id="fundersModal{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="fundersModalLabel{{ $project->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fundersModalLabel{{ $project->id }}">{{ $project->title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    View all users who funded this project
                    <table>
                        <th>Username</th>
                        <th>Package</th>
                        <th>Amount</th>
                        
                        @foreach($project->packages as $package)
                        
                            @foreach($package->sponsors as $sponsor)
                            <tr>
                                <td>{{ App\User::find($sponsor->user_id)->name }}</td>
                                <td>{{ $package->title }}</td>
                                <td>{{ $package->credit_amount }} credits</td>
                            </tr>
                            @endforeach
                            
                        @endforeach
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>
            @endforeach




            
            
        </div>
    </body>
</html>
