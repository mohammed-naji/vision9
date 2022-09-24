<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::all();
        // $posts = Post::orderBy('id', 'desc')->paginate(20);
        // $posts = Post::orderByDesc('id')->paginate(20);
        // $posts = Post::latest('id')->paginate(20);
        // $posts = Post::simplepaginate(20);
        // dd($posts);

        if(request()->has('word')) {
            $posts = Post::latest('id')->where(request()->searchby, 'like', '%'.request()->word.'%')->paginate(request()->count);
        }else {
            $posts = Post::latest('id')->paginate(20);
        }
        return view('posts.index', compact('posts'));
    }
}
