<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getIndex()
    {
        $projects = DB::table('projects')
        ->select('*', \DB::raw('projects.id as projectId'))
        ->inRandomOrder()
        ->take(5)
        ->join('users', 'projects.user_id', '=', 'users.id')
        // Prevent expired projects
        ->where('final_time', '>=', Carbon::now())
        ->get();

    $sponsoredProjects = null;  // DB::table('projects')


    return view('welcome', ['projects' => $projects] /*, ['sponsoredPorjects' => $sponsoredProjects] */ );
    }
}
