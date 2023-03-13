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
        $tweets = Post::with('user', 'comment')->latest()->get();
        $retweets = Retweet::with('retweets')->latest()->get();
        $users = User::with('post')->get();

        foreach($comments as $comment){
            $getComment = $comment['comments'];
        }

        if($comments->isEmpty()){
            return view('components.timeline', ['tweets' => $tweets,
                                                'users' => $users,
                                                'comments' => Comment::with('post', 'user')->get(),
                                                'retweets' => $retweets]);
        }

       else{
         return view('components.timeline', ['tweets' => $tweets,
                                            'commentid' => Comment::with('user')->where('post_id', '=', $getComment)->get(),
                                            'users' => $users,
                                            'comments' => Comment::with('post', 'user')->get(),
                                            'retweets' => $retweets]);
       }

    }
}
