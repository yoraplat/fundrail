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
        
        ->get();

        
        foreach($projects as $project){
            $total = 0;
            foreach($project->sponsors as $sponsor) {
                $total = $total + $sponsor->fundings->credit_amount;
            }
            $project->total = $total;
        }

        
        
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
