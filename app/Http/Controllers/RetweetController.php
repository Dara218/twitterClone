<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Retweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RetweetController extends Controller
{
    public function store(Post $post){

        Retweet::create([
            'user_id' => $post->user_id,
            'new_user_id' => Auth::user()->id,
            'post_id' => $post->id,
            'comment_value' => $post->post_value,
            'likes' => $post->likes,
            'comments' => $post->comments,
            'retweets' => $post->retweets,
        ]);

        // dd($retweet);

        return back();
    }
}
