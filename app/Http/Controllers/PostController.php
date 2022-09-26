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

    public function show($id)
    {
        // $post = Post::find($id);
        $post = Post::findOrFail($id);
        // if(!$post) {
        //     // return 'Post Not Found';
        //     abort(404);
        // }
        // $post = Post::where('id', $id)->get();
        // $post = Post::where('id', $id)->first();

        dd($post->title);
    }

    public function destroy($id)
    {
        Post::destroy($id);

        return redirect()->route('posts.index');
    }

    public function trash()
    {
        $posts = Post::onlyTrashed()->latest('id')->paginate(20);
        return view('posts.trash', compact('posts'));
    }

    public function restore($id)
    {
        Post::onlyTrashed()->find($id)->restore();

        return redirect()->route('posts.trash');
    }

    public function forcedelete($id)
    {
        Post::onlyTrashed()->find($id)->forcedelete();

        return redirect()->route('posts.trash');
    }

    public function search(Request $request)
    {
        echo 'you search about ' .$request->txt;
    }
}
