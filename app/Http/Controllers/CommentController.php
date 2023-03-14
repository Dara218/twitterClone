<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Retweet;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post){

        $posts = Post::findOrFail($post->id);

        $request->validate([
            'post_value' => 'required|max:250'
        ]);

        $post = Comment::create([
            'user_id' => $request->user()->id,
            'post_id' => $post->id,

            'comment_value' => $request->post_value
        ]);

        $addPostToTweet = Post::find($posts->id);
        $addPostToTweet->increment('comments');

        return back()->with(['post' => $post]);
    }

    public function storeCommentRetweet(Request $request, Retweet $retweet){

        $posts = Retweet::findOrFail($retweet->id);

        $request->validate([
            'post_value' => 'required|max:250'
        ]);

        $retweet = Comment::create([
            'user_id' => $request->user()->id,
            'post_id' => $retweet->post_id,
            'retweet_id' => $retweet->id,
            'comment_value' => $request->post_value
        ]);

        Retweet::find($posts->id)->increment('comments');

        return back();
    }

    public function destroy(Comment $comment){

        $comment->delete();
        Post::where('id', $comment->post_id)->decrement('comments');

        return back();
    }
}
