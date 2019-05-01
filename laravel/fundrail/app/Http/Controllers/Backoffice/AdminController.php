<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\Category;
use App\User;
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
}