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

        $image = DB::table('image_posts')
        ->select('*')
        ->where('post_id', '=', $id)
        ->join('images', 'image_id' , '=', 'images.id')
        ->first();

        $image->path = str_replace('img/', '', $image->path);

        return view('pages.post', ['post' => $post], ['image' => $image]);
    }
}
