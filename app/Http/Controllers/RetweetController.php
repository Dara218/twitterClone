<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Retweet;
use Illuminate\Http\Request;

class RetweetController extends Controller
{
    public function create(Comment $comment, Request $request){

        $comment = Comment::all();

        // TODO:FIX THIS POST. I NEED TO FIND POST_VALUE
        $post = Post::where();

        foreach ($comment as $userComment){

            dd($userComment->post_id);
            Retweet::create([
                'user_id' => $request->user()->id,
                'original_user' => $userComment->user_id,
                'post_id' => $comment->post_id,

            ]);
        }

        // Retweet::create([
        //     'user_id' => $request->user()->id,
        //     'original_user' => $comment->user_id,
        //     // 'post_id' => $comment->,

        // ]);
    }
}
