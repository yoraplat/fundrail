<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\Package;
use Illuminate\Support\Facades\Auth;
use PDF;

class AnalyticsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex() {

        $projects = Project::select('*')
        ->where('user_id', '=', Auth::id())
        ->get();
        /*
        $projectPackages = Package::select('*')
        ->where('project_id', '=', );
        $funders = User::select('*')
        ->where('');
        */



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
