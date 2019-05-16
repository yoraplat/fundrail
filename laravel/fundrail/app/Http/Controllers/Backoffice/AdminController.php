<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\Category;
use App\User;
use App\News;
use App\Image;
use App\ImagePost;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function getProjects() {
        $projects = DB::table('projects')
        ->select('*',\DB::raw('projects.id as projectId'))
        ->join('users', 'projects.user_id', '=', 'users.id')
        ->paginate(15);


        return view('backoffice.admin-dashboard', ['projects' => $projects]);
    }
/*
    public function searchProjects(Request $request) {
        $search = Input::get('search');

        $result = Project::where('title', 'LIKE', '%' . $search . '%')->get();
        return redirect()->back()->with('projects', '=', $result);
    }
*/

    public function getUsers() {
        $users = DB::table('users')
        ->select('*')
        ->paginate(15);

        return view('backoffice.admin-dashboard-users', ['users' => $users]);
    }

    public function deleteUser($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }

    public function getCategories() {
        $categories = Category::select('*')
        ->paginate(20);
        return view('backoffice.admin-dashboard-categories', ['categories' => $categories]); 
    }

    public function deleteCategory($id) {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back();
    }

    public function storeCategory(Request $request) {
        request()->validate([
            'category' => 'required|max:50',
        ]);

        $category = new Category;

        $category->name = $request->input('category');
        $category->save();

        return redirect()->back();
    }

    public function getPosts() {

        $posts = News::select("*", "news.id as postId")
        ->join('users', 'news.author', '=', 'users.id')
        ->paginate(20);


        return view('backoffice.admin-dashboard-posts', ['posts' => $posts]);
    }

    public function newPost() {
        return view('pages.new-post');
    }

    public function storePost(Request $request) {

        request()->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:255',
        ]);

        $post = New News;

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->author = auth()->id();
        $post->save();

        $currentTime = Carbon::now();
        $image = new Image();
        $image->title = $currentTime;
        
        
        if ($request->hasFile('image'))
        {
            $image->path = $request->file('image')->store('img/posts');
        } else {
            $image->path = 'No File';
        }
        $image->save();
        

        $posImages = new ImagePost();
        $posImages->post_id = $post->id;
        $posImages->image_id = $image->id;
        
        $posImages->save();
        
        

        return redirect()->route('admin-posts');
    }

    public function editPost($id, Request $request) {
        $post = News::findorfail($id);
        $post->get();

        $image = DB::table('image_posts')
        ->select('*', \DB::raw('image_id as imageId'))
        ->join('images', 'image_posts.image_id', '=', 'images.id')
        ->first();

        return view('pages.edit-post', ['post' => $post, 'image' => $image]);
    }

    public function savePost(Request $request, $id) {
        $post = News::findorfail($id);
        request()->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:255',
        ]);

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

       

        return redirect()->route('admin-posts');

    }

    public function deletePost($id) {
        $post = News::findorfail($id);
        $post->delete();

        return redirect()->back();
    }
}