<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
		$results = Post::where([['title','LIKE','%'.$request->str.'%']])->paginate(20);
    	return view('search', compact('results'));
    }

    public function suggest(Request $request){
    	$results = Post::where([['title','LIKE','%'.$request->str.'%']])->limit(5)->get();
    	return $results;
    }
}
