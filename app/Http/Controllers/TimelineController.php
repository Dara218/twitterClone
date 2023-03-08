<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function home(){

        return view('components.timeline', ['tweets' => Post::latest()->with('user', 'comment')->get(),
                                            'users' => User::with('post')->get(),
                                            'comments' => Comment::with('post', 'user')->get()]);
    }
}
