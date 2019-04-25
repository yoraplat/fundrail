<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Sponsor;
use App\Package;
use App\Project;

class FundsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getFunds() {
        $id = Auth::id();

        $funds = User::find($id);
        $funds->get();

        $fundedProjects = DB::table('project_sponsors')
        ->select('*', \DB::raw('packages.title as packageTitle, projects.title as projectTitle, packages.credit_amount as packageCredits'))
        ->join('packages', 'project_sponsors.package_id', '=', 'packages.id')
        ->where('project_sponsors.user_id', '=', $id)
        ->join('projects', 'packages.project_id', '=', 'projects.id')
        ->get();

        return view('pages.funds', ['funds' => $funds], ['fundedProjects' => $fundedProjects]);
    }

    public function addFunds(Request $request) {
        $id = Auth::id();
        $user = User::findOrFail($id);
        
        request()->validate([
            'funds' => 'required|integer',
            
        ]);

        $totalCredits = $request->input('funds') + $user->credits;
        $user->credits = $totalCredits;
        $user->save();
        
        return redirect()->route('get-funds');
    }

    public function addProjectFunds(Request $request) {


        // Get total credits of user
        $currentFunds = Auth::user()->credits;
        
        // Get package price
        $packageCost = Package::findOrFail( $request->input('packageId'))
        ->select('credit_amount')
        ->where('id', '=', $request->input('packageId') )
        ->first();
        
        $user = User::findOrFail(Auth::id());

        
        if ($currentFunds >= $packageCost->credit_amount ) {
            $sponsor = new Sponsor();
            $sponser = DB::table('project_sponsors');
            $sponsor->package_id = $request->input('packageId');
            $sponsor->user_id = Auth::id();
            $sponsor->save();

            $user->credits = $currentFunds - $packageCost->credit_amount;
            $user->save();

            // Admin fee

            $admin = User::select('*')->where('role_type', '=', '1')->first();
            $admin->credits = $admin->credits + (($packageCost->credit_amount / 100) * 10);
            $admin->save();

            // Project owner fee

            $project = Project::select('*',\DB::raw('user_id as userId'))
            ->where('id', '=', $request->input('projectId'))
            ->first();
            
            $projectOwner = User::select('*')
            ->where('id', '=', $project->userId)
            ->first();

            $projectOwner->credits = $projectOwner->credits + ($packageCost->credit_amount - (($packageCost->credit_amount / 100) * 10));
            $projectOwner->save();

            return redirect()->back();
        } else {
            return redirect()->back();
        }
        

            
    }
}
