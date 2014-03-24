@extends('admin.template')

@section('page-title')
Please sign in
@endsection

@section('head')
<link rel="stylesheet" href="{{ URL::asset('/assets/css/signin.css') }}" type="text/css" media="screen">
@endsection

@section('javascript')
@endsection

@section('admin-content')

  <div class="container">

    {{ Form::open(['class' => 'form-signin']) }}

      <h2 class="form-signin-heading">Please sign in</h2>

      {{ Form::email('email', Input::get('email'), ['class' => 'form-control', 'placeholder' => 'Email address', 'required', 'autofocus']) }}

      {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required']) }}

      {{ Form::submit('Sign in', ['class' => 'btn btn-lg btn-primary btn-block']) }}

    {{ Form::close() }}

  </div>

@endsection
