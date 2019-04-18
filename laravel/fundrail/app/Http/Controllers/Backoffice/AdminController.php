<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function admin()
    {
        return view('backoffice.admin-dashboard');
    }
}
