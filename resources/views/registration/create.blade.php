@extends('layout.master')
@section('content')
	{!! Form::open(['url' => 'register', 'method' => 'post']) !!}
		{!! Form::label('name', 'Name:') !!}
		{!! Form::text('name', null , ['class' => 'form-control', 'required']) !!}

		 {!! Form::label('email', 'Email:') !!}
		{!! Form::text('email', null , ['class' => 'form-control', 'required']) !!}

		{!! Form::label('password', 'Password:') !!}
		{!! Form::password('password', ['class' => 'form-control', 'required']) !!}

		{!! Form::label('password_confirmation', 'Password Confirm:') !!}
		{!! Form::password('password_confirmation', ['class' => 'form-control', 'required']) !!}
		<br>
		{!! Form::submit('Register', ['class' => 'btn btn-primary form-control']) !!}
	{!! Form::close() !!}
	<br>
	@include('layout.errors')

@endsection