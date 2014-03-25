@extends('admin.template')

@section('admin-head')
@endsection

@section('admin-javascript')
@endsection

@section('admin-content')

  <div class="page-header">
    <h1>Edit Photo #{{ $photo->id }} - {{{ $photo->name }}}</h1>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <img src="{{ URL::asset(Config::get('app.upload_destination') . '/' . $photo->filename) }}" alt="{{{ $photo->name }}}" class="img-responsive">
    </div>

    <div class="col-lg-6">
      {{ Form::model($photo, ['class' => 'form-horizontal']) }}

        <div class="form-group">

          <label for="name">Photo Name</label>

          {{ Form::text('name', Input::get('name'), ['class' => 'form-control', 'placeholder' => 'Photo Name']) }}

        </div>

        {{ Form::submit('Save', ['class' => 'btn btn-success']) }}
        <a href="{{ URL::to('/admin/photo') }}" class="btn btn-danger">Cancel</a>

      {{ Form::close() }}
    </div>
  </div>

@endsection
