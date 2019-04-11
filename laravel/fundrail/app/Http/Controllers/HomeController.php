<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        ->inRandomOrder()
        ->take(5)
        ->join('users', 'projects.user_id', '=', 'users.id')
        ->get();
        return view('welcome', ['projects' => $projects]);
    }
}
