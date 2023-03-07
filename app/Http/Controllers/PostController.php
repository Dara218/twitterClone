<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Post $post, Request $request){

        // dd($post->users());

        $request->validate([
            'post_value' => 'required'
        ]);

        Post::create([
            'user_id' => $request->user()->id,
            'post_value' => $request->post_value
        ]);

        return back();
    }
}