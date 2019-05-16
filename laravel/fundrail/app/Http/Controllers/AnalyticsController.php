<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\Package;
use Illuminate\Support\Facades\Auth;
use PDF;
use Lavacharts;

class AnalyticsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex() {

        $projects = Project::select('*')
        ->where('projects.user_id', '=', Auth::id())
        
        ->join('packages', 'projects.id','=', 'packages.project_id' )
        
        /*
        ->join('packages', 'projects.id','=', 'packages.project_id' )
        ->join('project_sponsors', 'packages.id', '=', 'project_sponsors.package_id')
        ->join('users', 'project_sponsors.user_id', '=', 'users.id')
        ->orderBy('projects.id')
        */
        ->get();
        /*
        $projectPackages = Package::select('*')
        ->where('project_id', '=', );
        $funders = User::select('*')
        ->where('');
        */

        $data = \Lava::DataTable();
        $data->addDateColumn('Day of Month')
                    ->addNumberColumn('Projected')
                    ->addNumberColumn('Official');

        // Random Data For Example
        for ($a = 1; $a < 30; $a++)
        {
            $rowData = [
            "2014-8-$a", rand(800,1000), rand(800,1000)
            ];

            $data->addRow($rowData);
        }

        \Lava::LineChart('Stocks', $data, [
        'title' => 'Stock Market Trends'
        ]);
        


        return view('pages.analytics', ['projects' => $projects]);
    }

    public function DownloadPDF($id) {
        $project = Project::findOrFail($id);

        $pdf = PDF::loadView('pdf.pdf', compact('project'));
        return $pdf->download('project' . $project->id . '.pdf');
    }

    public function ShowPDF($id) {
        $project = Project::findOrFail($id);

        return view('pdf.pdf', ['project' => $project]);
    }
}
