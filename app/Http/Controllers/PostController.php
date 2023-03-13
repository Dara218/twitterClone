<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'post_value' => 'required'
        ]);

        Post::create([
            'user_id' => $request->user()->id,
            'post_value' => $request->post_value
        ]);

        return back();
    }

    public function destroy(Post $post){

        $post->delete();
        return back();
    }
}
