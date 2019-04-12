<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getPackages() {
        $packages = Package::all();
        return view('pages.packages', ['packages' => $packages]);
    }

    public function newPackage() {
        return view('pages.new-package');
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
        $package->save();

        return redirect()->route('get-packages');
    }


    public function deletePackage($id) {
        $package = Package::find($id);
        $package->delete();
        
        return redirect()->route('get-packages');
    }

    public function editPackage($id) {
        
        $package = Package::find($id);
        $package->get();
        return view('pages.edit-package', ['package' => $package]);
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
