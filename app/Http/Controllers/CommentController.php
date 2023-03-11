<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
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

    public function destroy(Comment $comment){

        $comment->delete();

        $postId = $comment->post_id;
        Post::where('id', $postId)->decrement('comments');

        return back();
    }

}
