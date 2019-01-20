<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(20);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $categories = Category::all();
        return view('admin.posts.create', compact('categories', 'users'));
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
            'category'=>'required|integer',
            'title'=>'required|string',
            'postcontent'=>'nullable|string',
            'published'=>'required|integer'
        ]);

        $post = Post::create([
            'author_id'=>$request->user,
            'category_id'=>$request->category,
            'title'=>$request->title,
            'content'=>$request->postcontent,
            'published'=>$request->published
        ]);

        if($post){
            if($request->file('image')){
                $post->image = $request->image;
                $post->save();
            }
            Session::flash('success', 'Post created');
            return redirect('/admin/posts');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $users = User::all();
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'users', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'user'=>'required|integer',
            'category'=>'required|integer',
            'title'=>'required|string',
            'postcontent'=>'nullable|string',
            'published'=>'required|integer'
        ]);

        $post->author_id = $request->user;
        $post->category_id = $request->category;
        $post->title = $request->title;
        $post->content = $request->postcontent;
        $post->published = $request->published;
        if($request->file('image')){
            $post->image = $request->image;
        }
        if($post->save()){
            Session::flash('success', 'Post updated');
            return redirect('/admin/posts');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if(Post::destroy($post->id)){
            Session::flash('success', 'Post deleted');
            return redirect()->back();
        }
    }

    public function changePublishedStatus(Post $post){
        $post->published == '1' ? $post->published = '0' : $post->published = '1';
        if($post->save()){
            return redirect()->back();
        }
    }
}
