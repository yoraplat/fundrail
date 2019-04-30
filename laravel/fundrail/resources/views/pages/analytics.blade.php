<html>
<!DOCTYPE=HTML>
@include('includes.header')
    <body>
    @include('includes.nav')
    @include('includes.subnav')
        <div class="container" id="showcase-container">
            <h2>Project Analytics</h2>
            <div class="border">
            @foreach ($projects as $project)
                <div class="row">
                    <div class="col-2">{{$project->title}}</div>
                    <div class="col-3"><a href="#" class="btn btn-primary">View progress</a></div>
                    <div class="col-3"><a href="{{ route('download-pdf', ['id' => $project->id]) }}" class="btn btn-primary">Download PDF</a></div>
                    <div class="col-2"><a href="{{ route('show-pdf', ['id' => $project->id]) }}" class="btn btn-primary">Show PDF</a></div>
                    <div class="col-2"><a href="" data-toggle="modal" data-target="#fundersModal{{ $project->id }}" class="btn btn-primary">Funders</a></div>
                </div>

                <!-- Modal -->
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

                        <tr>
                        </tr>
                    </table>

                    {{ var_dump($project)}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>
            @endforeach
            </div>
        </div>
    </body>
</html>
