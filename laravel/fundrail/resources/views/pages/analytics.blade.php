<html>
<!DOCTYPE=HTML>
@include('includes.header')
    <body>
    @include('includes.nav')
    @include('includes.subnav')
        <div class="container" id="showcase-container">
            <h2>Project Analytics <small>(Projects without packages are not visible)</small></h2>
            <div class="border">
            @foreach ($projects as $project)
                <div class="row">
                    <div class="col-2">{{$project->title}}</div>
                    <div class="col-2"><a href="" data-toggle="modal" data-target="#progressModal{{ $project->id }}" class="btn btn-primary">View Progress</a></div>
                    <div class="col-3"><a href="{{ route('download-pdf', ['id' => $project->id]) }}" class="btn btn-primary">Download PDF</a></div>
                    <div class="col-2"><a href="{{ route('show-pdf', ['id' => $project->id]) }}" class="btn btn-primary">Show PDF</a></div>
                    <div class="col-2"><a href="" data-toggle="modal" data-target="#fundersModal{{ $project->id }}" class="btn btn-primary">Funders</a></div>
                </div>

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
                        <th>Amount</th>
                        {{ $project->name }}
                        <tr>
                        </tr>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>


            <!-- Progress Modal -->
            <div class="modal fade" id="progressModal{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="progressModalLabel{{ $project->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="progressModalLabel{{ $project->id }}">{{ $project->title }} progress</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>
            @endforeach
            </div>

            @linechart('Stocks', 'stocks-div')
        </div>
    </body>
</html>
