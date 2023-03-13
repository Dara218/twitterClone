<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Retweet;
use App\Models\User;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function home(){

        $comments = Post::with('comment')->get();
        $retweets = Retweet::all();

        foreach($comments as $comment){
            $getComment = $comment['comments'];
        }

        if($comments->isEmpty()){
            return view('components.timeline', ['tweets' => Post::with('user', 'comment')->latest()->get(),
                                                'users' => User::with('post')->get(),
                                                'comments' => Comment::with('post', 'user')->get(),
                                                'retweets' => Retweet::with('retweets')->latest()->get()]);
        }

       else{
         return view('components.timeline', ['tweets' => Post::with('user', 'comment')->latest()->get(),
                                            'commentid' => Comment::with('user')->where('post_id', '=', $getComment)->get(),
                                            'users' => User::with('post')->get(),
                                            'comments' => Comment::with('post', 'user')->get(),
                                            'retweets' => Retweet::with('retweets')->latest()->get()]);
       }

    }
}
