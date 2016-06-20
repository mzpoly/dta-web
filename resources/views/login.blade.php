@extends('template')

@section('title','Log In')

@section('content')

    {!! Form::open(['url' => 'login']) !!}
    {!! Form::label('login', 'Login : ') !!}
    {!! Form::text('login') !!}
    {!! Form::label('password', 'Password : ') !!}
    {!! Form::password('password') !!}
    {!! Form::submit('Log In') !!}
    {!! Form::close() !!}


@endsection