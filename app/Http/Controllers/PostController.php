<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Category;
use Illuminate\Http\Request;
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
        $posts = Post::paginate(20);
        // $posts = Post::where('category_id','=','1')->paginate(20);
        // $posts_2 = Post::where('category_id','=','2')->paginate(20);
        return view('posts.index', compact('posts'));
    }

    public function byAuthor(User $author){
        $posts = Post::where('author_id','=',$author->id)->paginate(5);
        return view('posts.author', compact('posts','author'));
    }

    public function category($category_id){
        $posts = Post::where('category_id','=',$category_id)->paginate(10);
        $category = Category::find($category_id);
        return view('posts.category', compact('posts','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
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
            'title'=>'required|string',
            'postcontent'=>'required',
            'category'=>'required|integer'
        ]);

        $post = Post::create([
            'title'=>$request->title,
            'content'=>$request->postcontent,
            'author_id'=>auth()->user()->id,
            'category_id'=>$request->category
        ]);

        if($post){
            if($request->file('image')){
                $post->image = $request->file('image');
                $post->save();
            }

            return redirect('/posts/'.$post->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'=>'required|string',
            'postcontent'=>'required|string',
            'category'=>'required|integer'
        ]);

        $post->title = $request->title;
        $post->content = $request->postcontent;
        $post->category_id = $request->category;

        if($request->file('image')){
            $post->image = $request->file('image');
        }

        if($post->save()){
            Session::flash('success', 'Post update');
            return redirect('user/posts');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if(Post::destroy($post->id)){
            Session::flash('error', 'Post '.$post->title.' has been deleted');
            return redirect()->back();
        }
    }
}
