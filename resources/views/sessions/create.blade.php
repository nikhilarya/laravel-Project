@extends('layout.master')
@section('content')
	{!! Form::open(['url' => 'login']) !!}
		{!! Form::label('email', 'Email:') !!}
		{!! Form::text('email', null , ['class' => 'form-control', 'required']) !!}

		{!! Form::label('password', 'Password:') !!}
		{!! Form::password('password', ['class' => 'form-control', 'required']) !!}
		<br>
		{!! Form::submit('Login', ['class' => 'btn btn-primary form-control']) !!}
	{!! Form::close() !!}
	<br>
	@include('layout.errors')

@endsection