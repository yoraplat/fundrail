<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectsController extends Controller
{
    
    public function getProjects() {

        $projects = DB::table('projects')
        ->select('*')
        ->join('users', 'projects.user_id', '=', 'users.id')
        ->paginate(15);
        return view('pages.projects', ['projects' => $projects]);
    }

    public function getProjectById($id) {

        $project = DB::table('projects')
        ->select('*')
        ->where('projects.id', '=', $id)
        ->first();

        return view('pages.project', ['project' => $project]);
    }
}
