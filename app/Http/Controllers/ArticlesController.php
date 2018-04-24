<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Article;


class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
    	$articles = Article::latest()
            ->filter(request()->only(['month', 'year']))
            ->get();
    	//dd($articles);
        //Temporary
       
       //return $archives;
    	return view('articles.index', compact('articles'));

    }

    public function show($id)
    {
    	$articles = Article::findOrFail($id);
    	//return $articles;
    	return view('articles.show', compact('articles', $articles));

    }

    public function create()
    {
    	return view('articles.create');
    }

    public function store(Request $request)
    {
    	//dd($request->published_at);
    	$articles = new Article;
    	$articles->title = $request->title;
    	$articles->body = $request->body;
        $articles->user_id = auth()->id();
    	$articles->published_at = $request->published_at;
    	$articles->save();

        session()->flash('message', 'Your post has been published!');

    	return redirect()->home();
    }
}
