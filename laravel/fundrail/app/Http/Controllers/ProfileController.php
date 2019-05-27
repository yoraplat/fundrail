<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function getProfile() {
        return view('pages.profile');
    }

    public function editProfile(Request $request) {
        $user = Auth::user();

        request()->validate([
            'email' => 'required|email',
        ]);

        $user->email = $request->input('email');
        $user->save();

        return redirect()->back();
    }
}
