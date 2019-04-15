<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getPackages() {
        $id = Auth::id();
        
        $packages = DB::table('packages')
                ->select('*', \DB::raw('packages.id as packageId'))
                ->join('users', 'packages.creator_id', '=', 'users.id')
                ->where('users.id', '=', $id)
                ->get();
                
                /*
        $packages = Package::all();
        */

        return view('pages.packages', ['packages' => $packages]);

    }

    public function newPackage() {
        $userId = Auth::id();
        $projects = DB::table('projects')
        ->select('*', \DB::raw('projects.id as projectId'))
        ->join('users', 'projects.user_id', '=', 'users.id')
        ->where('projects.user_id', '=', $userId )
        ->get();

        return view('pages.new-package', ['projects' => $projects]);
    }

    public function createPackage(Request $request) {

        request()->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'projectId' => 'required',
            'credits' => 'required',
        ]);
        

        
        $package = new Package();

        $package->title = $request->input('title');
        $package->description = $request->input('description');
        $package->project_id = $request->input('projectId');
        $package->credit_amount = $request->input('credits');
        $package->creator_id = Auth::id();
        $package->save();

        return redirect()->route('get-packages');
    }


    public function deletePackage($id) {
        $package = Package::findOrFail($id);
        $package->delete();
        
        return redirect()->route('get-packages');
    }

    public function editPackage($id) {
        $userId = Auth::id();

        $package = Package::find($id);
        $package->select('*');
        $package->get();

        $projects = DB::table('projects')
        ->select('*', \DB::raw('projects.id as projectId'))
        ->join('users', 'projects.user_id', '=', 'users.id')
        ->where('projects.user_id', '=', $userId )
        ->get();
        

        return view('pages.edit-package',['projects' => $projects],   ['package' => $package]);
    }

    public function savePackage(Request $request, $id) {
        
        $package = Package::findOrFail($id);
        
        
        request()->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'projectId' => 'required',
            'credits' => 'required',
        ]);
        
        $package->title = $request->input('title');
        $package->description = $request->input('description');
        $package->project_id = $request->input('projectId');
        $package->credit_amount = $request->input('credits');
        $package->save();
        
        return redirect()->route('get-packages');
    }
}
