<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;

class PostsController extends Controller
{
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('post', [
            'post' => $posts[$post]
        ]);
    }

    public function create($slug)
    {
        $post = DB::table('posts')->where('slug', $slug)->first();

        return view('post', [
            'post' => $posts[$post]
        ]);
    }
}
