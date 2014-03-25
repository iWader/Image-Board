@extends('template')

@section('head')
  <link rel="stylesheet" href="{{ URL::asset('/assets/css/admin.css') }}" type="text/css" media="screen">

  @yield('admin-head')

@endsection

@section('javascript')

  @yield('admin-javascript')

@endsection

@section('content')

  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="{{ URL::to('/admin/dashboard') }}" class="navbar-brand">Image Board</a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav pull-right">
          <li @if(Request::is('admin/dashboard')) class="active" @endif><a href="{{ URL::to('/admin/dashboard') }}">Dashboard</a></li>
          <li @if(Request::is('admin/photo')) class="active" @endif><a href="{{ URL::to('/admin/photo') }}">Photos</a></li>
          <li @if(Request::is('admin/photo/create')) class="active" @endif><a href="{{ URL::to('/admin/photo/create') }}">Upload Photo</a></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="container">

      @yield('admin-content')

    </div>
  </div>

@endsection
