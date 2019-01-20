<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;

use Illuminate\Http\Request;

class UserController extends Controller
{
	public function posts(){
		$posts = Post::where('author_id','=',auth()->user()->id)->paginate(20);
    	return view('users.posts',compact('posts'));
	}

	public function comments(){
		$comments = Comment::where('user_id','=',auth()->user()->id)->paginate(20);
    	return view('users.comments', compact('comments'));
	}
}
