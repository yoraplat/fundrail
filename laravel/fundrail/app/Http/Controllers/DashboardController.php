<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Project;
use App\ImageProject;
use App\Image;
use App\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getDashboard() {
        $id = Auth::id();
        $projects = Project::select('*', \DB::raw("projects.id as projectId"))
                    ->where('user_id', '=', $id)
                    ->paginate(15);


        // Visualize packages and funders
        // foreach($projects as $project) {
        //     echo '<a>' . $project->title . '</a><br>';

        //     foreach($project->packages as $package) {
        //         echo '------' . $package->title . '<br>';

        //         foreach($package->sponsors as $sponsor) {
        //             echo '--------------' . User::find($sponsor->user_id)->name . '<br>';
        //         }
        //     }

        // }

        return view('pages.dashboard', ['projects' => $projects]);
    }

    public function newProject() {

        $categories = DB::table('categories')
        ->select('*')
        ->get();

        return view('pages.new-project', ['categories' => $categories]);
    }

    public function createProject(Request $request) {
        
        
        request()->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'intro' => 'required|max:255',
            'content' => 'required|max:255',
            'category' => 'required',
            'credits' => 'required|integer',
            'time' => 'required',
            'image[]' => 'image|mimes:jpeg,png,jpg,gif,svg',
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



        if (Input::hasFile('image'))
        {
            

            foreach(Input::file('image') as $file)
            {
                $image = new Image();
                $storagePath = Storage::put('img/projects/', $file);
                $storageName = basename($storagePath);
                $image->title = $storageName;
                $image->path = 'img/projects/' . $storageName ;
                $image->save();

                // Save project images to pivot table
                $projectImage = new ImageProject();
                $projectImage->project_id = $project->id;
                $projectImage->image_id = $image->id;
                $projectImage->save();
            }
        }
        

        return redirect()->route('user-dashboard');

        
    }

    public function deleteProject($id) {

        $userId = Auth::id();
        
        if (Auth::user()->isAdmin() or $userId == $project->user_id)
        {
            $project = Project::find($id);
            $project->delete();
            
            return redirect()->back();
        } else {
            return redirect()->back();
        }
}

    public function editProject($projectId) {
        $id = $projectId;
        $project = Project::find($id);
        $project->get();

        $categories = DB::table('categories')
        ->select('*')
        ->get();

        $images = DB::table('image_projects')
        ->select('*', \DB::raw('image_id as imageId'))
        ->join('images', 'image_projects.image_id', '=', 'images.id')
        ->where('image_projects.project_id', '=', $projectId)
        ->get();

        return view('pages.edit-project')->with(compact('project', 'categories', 'images'));
    }

    public function saveProject(Request $request, $id) {
        $userId = Auth::id();
        $project = Project::findOrFail($id);
        
        request()->validate([
            'description' => 'required|max:255',
            'intro' => 'required|max:255',
            'content' => 'required|max:255',
            'category' => 'required',
            'credits' => 'required|integer',
            
        ]);

        $userId = Auth::id();

        if (Auth::user()->isAdmin() or $userId == $project->user_id)
        {
            $project->description = $request->input('description');
            $project->intro = $request->input('intro');
            $project->content = $request->input('content');
            $project->category_id = $request->input('category');
            $project->credit_goal = $request->input('credits');
            $project->save();

            return redirect()->route('user-dashboard');
        } else {
            return redirect()->back();
        }     
        
        
    }
}
