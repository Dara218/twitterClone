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
            dd($post);
        }

        $request->validate([
            'post_value' => 'required|max:250'
        ]);

        Comment::create([
            'user_id' => $request->user()->id,
            // 'post_id' => 
            'comment_value' => $request->post_value
        ]);

        return back();

    }
}
