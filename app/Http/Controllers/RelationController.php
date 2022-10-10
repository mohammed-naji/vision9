<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Models\Insurance;
use App\Models\Student;
use App\Models\Subject;
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

    public function many_to_many()
    {
        $std = Student::find(1);

        $subjects = Subject::where('college', $std->college)->get();

        // dd($std->subjects);

        return view('student_register', compact('std', 'subjects'));
    }

    public function many_to_many_data(Request $request)
    {
        // dd($request->all());
        $std = Student::find(1);

        // dd($std->subjects);
        // $std->subjects()->attach($request->subjects);
        // $std->subjects()->detach($request->subjects);
        $std->subjects()->sync($request->subjects);

        return redirect()->back();
    }
}
