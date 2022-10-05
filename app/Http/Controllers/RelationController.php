<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Models\Insurance;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    public function one_to_one()
    {

        $user = User::find(1);
        // // $insurance = Insurance::where('user_id', $user->id)->first();

        dd($user->insurance);

        $insurance = Insurance::with('user')->find(1);

        dd($insurance->user);

    }

    public function one_to_many()
    {
        // $post = Post::find(1);
        // dd($post->comments->count());

        $comment = Comment::find(1);

        dd($comment->user->name);
    }
}
