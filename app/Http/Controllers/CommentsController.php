<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
    	//dd($request->id);
    	//dd($articles->id);
    	$comments = new Comment;
    	$comments->article_id = (int)$request->id;
     	$comments->body = $request->body;
     	$comments->user_id = auth()->id();
    	//dd($comments);
    	$comments->save();

    	return back();
    }
}
