<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Sponsor;
use App\Package;

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

        $userId = Auth::id();

        // Get total credits of user
        $currentFunds = User::findOrFail($userId)->select('credits')->first();
        $packageCost = Package::findOrFail( $request->input('packageId'))->select('credit_amount')->first();
        
        $user = User::findOrFail($userId);
        
        if ($currentFunds->credits >= $packageCost->credit_amount ) {
            $sponsor = new Sponsor();
            $sponser = DB::table('project_sponsors');
            $sponsor->package_id = $request->input('packageId');
            $sponsor->user_id = $userId;
            $sponsor->save();

            $user->credits = $currentFunds->credits - $packageCost->credit_amount;
            $user->save();


            return redirect()->route('projects');
        } else {
            return redirect()->back();
        }
        

            
    }
}
