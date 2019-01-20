<?php

namespace App\Http\Controllers\Admin;


use App\Category;
use App\Post;
use App\Comment;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::orderBy('id', 'DESC')->paginate(20);
        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $posts = Post::all();
        return view('admin.comments.create', compact('users', 'posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'user'=>'required|integer',
            'id'=>'required|integer',
            'comment'=>'required|string',
            'published'=>'required|integer'
        ]);

         $comment = Comment::create([
            'author_id'=>$request->user,
            'post_id'=>$request->post,
            'comment'=>$request->comment,
            'published'=>$request->published
        ]);

         if($comment){
            Session::flash('success','Comment created');
            return redirect('/admin/comments');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return view('admin.comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        $users = User::all();
        $posts = Post::all();
        return view('admin.comments.edit', compact('comment', 'users', 'posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'user'=>'required|integer',
            'comment'=>'required|string',
            'published'=>'required|integer'
        ]);

        $comment->user_id = $request->user;
        $comment->comment = $request->comment;
        $comment->published = $request->published;
        if($comment->save()){
            Session::flash('success', 'Comment updated');
            return redirect('/admin/comments');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if(Comment::destroy($comment->id)){
            Session::flash('success', 'Comment deleted');
            return redirect()->back();
        }
    }

    public function changePublishedStatus(Comment $comment){
        $comment->published == '1' ? $comment->published = '0' : $comment->published = '1';
        if($comment->save()){
            return redirect()->back();
        }
    }
}
