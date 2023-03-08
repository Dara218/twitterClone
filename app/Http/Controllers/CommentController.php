<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post){

        $posts = Post::with('comment')->get();

        foreach ($posts as $post){
            $postId = $post->id;
        }

        $request->validate([
            'post_value' => 'required|max:250'
        ]);

        $comment = Comment::create([
            'user_id' => $request->user()->id,
            'post_id' => $postId,
            'comment_value' => $request->post_value
        ]);

        $addCommentToTweet = Post::find($postId);
        $addCommentToTweet->increment('comments', 1);

        return back()->with(['comment' => $comment]);

    }
}
