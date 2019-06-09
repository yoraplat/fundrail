<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\News;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function getPosts() {
        $news = News::select('*')
        ->orderBy('created_at', 'DESC')
        ->get();
        return view('pages.news', ['news' => $news]);
    }

    public function getPostById($id) {
        $post = News::findOrFail($id);
        $newPath = str_replace('img', '', $post->image_path);
        $post->image_path = $newPath;

        // dd($post->image_path);
        return view('pages.post', ['post' => $post]);
    }
}
