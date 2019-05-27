<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\News;
use App\Image;

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
        $news = DB::table('news')
        /*
        ->join('image_posts', 'news.id', '=', 'image_posts.image_id')
        ->join('images', 'image_posts.image_id', '=', 'images.id')
        */
        ->select('news.*')
        ->get();

        /*
        $news = News::select('*')
        ->join('image_posts', 'news.id', '=', 'image_posts.image_id')
        ->join('images', 'image_posts.image_id', '=', 'images.id')
        ->limit(7)->get();

        
        $images = Image::select('path')
        ->where('path', 'LIKE', 'img/posts/%')
        ->first();
        
        $images = str_replace('img/', '', $images->path);
        var_dump('Image urls: ' . $images);

        foreach($news as $new) 
        {
            var_dump("post title: " . $new->title);
        }
        */
    return view('welcome')->with(compact( 'news', 'projects'));
    }
}
