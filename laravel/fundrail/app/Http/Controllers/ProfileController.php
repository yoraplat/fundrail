<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function getProfile() {

        var_dump(Auth::user()->password);
        return view('pages.profile');
    }

    public function editProfile(Request $request) {
        $user = Auth::user();

        request()->validate([
            'email' => 'required|email',
            'current' => 'required',
        ]);
/*
    
        if (encrypt($request->input('current')) == $user->password) {
            $user->email = $request->input('email');
            //dd($request->input('new-password'));
            if ($request->input('new') != null) {
                $user->password = encrypt($request->input('new'));
            } 
            $user->save();
            return redirect()->back();
        } else {
            var_dump("current: " . $request->input('current'));
            var_dump("<br>");
            var_dump("current: " . encrypt($request->input('current')));
            var_dump("<br>");
            var_dump($user->password);
            var_dump("<br>");
            var_dump("new: " . $request->input('new'));
        }
        */

        
        if (password_verify($request->input('current'), $user->password)) {
            var_dump('pass correct');
            $user->email = $request->input('email');

            if ($request->input('new') != null) {
                $user->password = bcrypt($request->input('new'));
            }
            $user->save();
        }
        return redirect()->back();
    }
}
