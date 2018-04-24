<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
    	$posts = Post::all();
    	//dd($posts);
    	return view('posts.index', compact('posts'));
    }

    public function show($id)
    {

    	return view('posts.show');
    }
    public function create()
    {
    	return view('posts.create');
    }

    public function store(Request $request)
    {
    	//dd($request->published_at);
    	$posts = new Post;
    	$posts->title = $request->title;
    	$posts->body = $request->body;
    	//$posts->published_at = $request->published_at;
    	dd($posts);
    	$posts->save();

    	return redirect('posts');
    }
}
