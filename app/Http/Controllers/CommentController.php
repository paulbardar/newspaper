<?php

namespace App\Http\Controllers;

use App\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }


    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'comment'=>'required|string'
        ]);

        $comment->comment = $request->comment;

        if($comment->save()){
            Session::flash('success', 'Comment update');
            return redirect('user/comments');
        }
    }
}
