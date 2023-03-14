<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function store(Comment $comment, Request $request){

        $request->validate([
            'post_value' => 'required'
        ]);

        Reply::create([
            'user_id' => Auth::user()->id,
            'comment_id'=> $comment->id,
            'reply_value' => $request->post_value,
        ]);

        Comment::find($comment->id)->increment('comments');
        return back();
    }

    public function destroy(Reply $reply){

        $reply->delete();
        Comment::find($reply->comment_id)->decrement('comments');
        return back();
    }
}
