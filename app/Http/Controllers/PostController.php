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
        $posts = Post::latest('id')->where('title', 'like', '%'.request()->text.'%')->paginate(10);

        return $posts;
    }

    public function create()
    {
        $post = new Post();
        return view('posts.create', compact('post'));
    }

    public function store(Request $request)
    {
        // Validate Data
        // dd($request->all());
        $request->validate([
            'title' => 'required|min:3|max:100',
            'content' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        // Upload File
        $img_name = rand().rand().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/posts'), $img_name);

        // Add to Database
        // $post = new Post();
        // $post->title = $request->title;
        // $post->image = $img_name;
        // $post->content = $request->content;
        // $post->save();

        Post::create([
            'title' => $request->title,
            'image' => $img_name,
            'content' => $request->content,
        ]);

        // Redirect
        return redirect()->route('posts.index')->with('msg', 'Post added successfully');
        // return redirect()->back();
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:3|max:100',
            'content' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $post = Post::findOrFail($id);

        // Upload File
        $img_name = $post->image;
        if($request->hasFile('image')) {
            $img_name = rand().rand().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/posts'), $img_name);
        }

        $post->update([
            'title' => $request->title,
            'image' => $img_name,
            'content' => $request->content,
        ]);

        // Redirect
        return redirect()->route('posts.index')->with('msg', 'Post updated successfully');
    }
}
