<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Project;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getDashboard() {
        $id = Auth::id();
        /*
        $projects = DB::table('projects')
        ->select('*')
        ->join('users', 'projects.user_id', '=', 'users.id')
        ->where('users.id', '=', $id)
        ->paginate(15);
        */
        $projects = Project::select('*', \DB::raw("projects.id as projectId"))
                ->join('users', 'projects.user_id', '=', 'users.id')
                ->where('users.id', '=', $id)
                ->paginate(5);

        
        return view('pages.dashboard', ['projects' => $projects]);
    }

    public function newProject() {
        return view('pages.new-project');
    }

    public function createProject(Request $request) {
        
        
        request()->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'intro' => 'required|max:255',
            'content' => 'required|max:255',
            'category' => 'required',
            'credits' => 'required',
            'time' => 'required',
        ]);
        

        $user = auth()->user();
        $userId = $user->id;
        $currentTime = Carbon::now();
        $project = new Project();

        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->intro = $request->input('intro');
        $project->content = $request->input('content');
        $project->user_id = $userId;
        $project->category_id = $request->input('category');
        $project->credit_goal = $request->input('credits');
        $project->final_time = $request->input('time');
        $project->initial_time = $currentTime;
        $project->save();

        return redirect('/dashboard');
    }

    public function deleteProject($id) {
        $project = Project::find($id);
        $project->delete();
        
        return redirect()->route('user-dashboard');
    }

    public function editProject($projectId) {
        $id = $projectId;
        $project = Project::find($id);
        $project->get();
        return view('pages.edit-project', ['project' => $project]);
    }

    public function saveProject(Request $request, $id) {

        $project = Project::findOrFail($id);
        
        request()->validate([
            'description' => 'required|max:255',
            'intro' => 'required|max:255',
            'content' => 'required|max:255',
            'category' => 'required',
            'credits' => 'required',
            
        ]);


        $project->description = $request->input('description');
        $project->intro = $request->input('intro');
        $project->content = $request->input('content');
        $project->category_id = $request->input('category');
        $project->credit_goal = $request->input('credits');
        $project->save();
        
    

    
        
        
        return redirect()->route('user-dashboard');
    }
}
