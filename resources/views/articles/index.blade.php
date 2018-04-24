@extends('layout.master')
@section('content')
	
	@foreach( $articles as $article)
		<div class="blog-post">
            <h2 class="blog-post-title"><a href="{{ action('ArticlesController@show', [$article->id]) }}">{{ $article->title }}</a></h2>
            <p class="blog-post-meta">On {{ $article->published_at }} by {{ $article->user->name }}</p>

            <p>{{ $article->body }}</p>
          </div><!-- /.blog-post -->
	@endforeach

@endsection