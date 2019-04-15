<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Project;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    
    public function getProjects() {

        
        $projects = Project::select('*', \DB::raw("projects.id as projectId"))
        ->select('*')
        ->paginate(15);

        return view('pages.projects', ['projects' => $projects]);
    }   
    /*
        $projects = Project::select('*', \DB::raw("projects.id as projectId"))
        ->select('*')
        ->join('users', 'projects.user_id', '=', 'users.id')
        ->paginate(15);

        return view('pages.projects', ['projects' => $projects]);
        
    }
*/
    public function getProjectById($id) {
        /*
        $sponsors = DB::table('packages')
        ->select(\DB::raw('*, SUM(packages.credit_amount) as totalAmount'))
        ->join('project_sponsors', 'packages.id', '=', 'project_sponsors.package_id')
        ->where('packages.project_id', '=', $id)
        ->groupBy('packages.id')
        ->get();
        */

        

        $project = DB::table('projects')
        ->select('*', \DB::raw("projects.user_id as userId"))
        ->where('projects.id', '=', $id)
        ->first();

        $packages = DB::table('packages')
        ->select('*',\DB::raw("packages.id as packageId"))
        ->where('packages.project_id', '=', $id)
        ->get();


        return view('pages.project')->with(compact('sponsors', 'project', 'packages'));
    }
}
