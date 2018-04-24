@extends('layout.master')

@section('content')
	<h1>Create A Blog:</h1>
	{!! Form::open(['url' => 'posts']) !!}
		{!! Form::label('title', 'Title:') !!}
		{!! Form::text('title', null, ['class' => 'form-control']) !!}

		{!! Form::label('body', 'Body:') !!}
		{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
		<br>
		{!! Form::submit('submit', ['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}
@endsection