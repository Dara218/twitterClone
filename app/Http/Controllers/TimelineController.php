<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function home(){

        $comments = (Post::with('comment')->get());

        foreach($comments as $comment){
            $getComment = $comment['comments'];
        }

        if($comments->isEmpty()){
            return view('components.timeline', ['tweets' => Post::latest()->with('user', 'comment')->get(),
            'users' => User::with('post')->get(),
            'comments' => Comment::with('post', 'user')->get()]);
        }

       else{
         return view('components.timeline', ['tweets' => Post::latest()->get(),
                                            'commentid' => Comment::with('user')->where('post_id', '=', $getComment)->get(),
                                            'users' => User::with('post')->get(),
                                            'comments' => Comment::with('post', 'user')->get()]);
       }

    }
}
