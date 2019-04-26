<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Project;
use App\Image;
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
        ->select('*', \DB::raw("projects.user_id as userId, projects.final_time as finalTime, projects.id as projectId"))
        ->where('projects.id', '=', $id)
        ->first();

        $packages = DB::table('packages')
        ->select('*',\DB::raw("packages.id as packageId"))
        ->where('packages.project_id', '=', $id)
        ->get();

        $projectImages = DB::table('image_projects')
        ->select('image_id as imageId')
        ->where('image_projects.project_id', '=', $id)
        ->get()
        ->toArray();

        $images = array();


        if (!$images)
        {
            foreach($projectImages as $image)
            {
                $imageId = $image->imageId;
                $imageFound = Image::find($imageId);   
                // Remove img folder from url
                $images[] = str_replace('img/', '', $imageFound->path);
            }
        }
        

/*
        $images = DB::table('images')
        ->select('*')
        ->where('images.id', '=', $projectImages)
        ->get();
*/
/*
        $images = DB::table('images');
            foreach($projectImages as $projectImage)
            {
                $images->select('images.path');
                $images->where('images.id', '=', $projectImage);
                $images->get()->toArray();
            }
*/
        return view('pages.project')->with(compact('sponsors', 'project', 'packages', 'images'));
    }

    public function deleteImage($id) {
        $image = Image::find($id);
        $image->delete();

        $imageProject = DB::table('image_projects')
        ->select('*')
        ->where('image_id', '=', $id)
        ->delete();

        return redirect()->back();
    }
}
