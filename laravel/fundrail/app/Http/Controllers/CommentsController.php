<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function storeComment(Request $request) {
        
        request()->validate([
            'comment' => 'required|max:255',
        ]);


        $userId = Auth::id();
        $projectId = $request->input('projectId');

        $comment = new Comment;

        $comment->comment = $request->input('comment');
        $comment->user_id = $userId;
        $comment->project_id = $projectId;
        $comment->save();

        return redirect()->back();
    }
}
