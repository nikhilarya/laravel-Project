@extends('layout.master')
@section('content')
	<h1>{{ $articles->title }}</h1>
	@if(count($articles->tags))
		<ul>
			@foreach ($articles->tags as $tag)
				<li>
					<a href="/blog/articles/tags/{{$tag->name}}">
						{{$tag->name}}
					</a>
				</li>
			@endforeach	
		</ul>
	@endif

	<hr>
	<article>
		{{ $articles->body }}
	</article>
	<hr>
	<div class="comments">
		@foreach($articles->comments as $comment )
			<li class="list-group-items">
				<strong>
					{{ $comment->created_at->diffForHumans() }}:
				</strong>
				<article>
					{{ $comment->user->name }} Commented: {{ $comment->body }}
				</article>
			</li>
			
		@endforeach
		<br>
		<div class="card">
			<div class="card-block">
				{!! Form::open(['method' => 'POST', 'files'=>'true', 'route'=>['comment.add']]) !!}
					{!! Form::hidden('id', $articles->id) !!}
					{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
					<br>
					{!! Form::submit('Add Comment', ['class' => 'btn btn-primary']) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection