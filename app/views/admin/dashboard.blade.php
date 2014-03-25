@extends('admin.template')

@section('page-title')
Dashboard
@endsection

@section('admin-head')
@endsection

@section('javascript')
@endsection

@section('admin-content')

  <div class="row">
    <div class="col-lg-2 info-block">
      <span>{{ number_format(Photo::count()) }}</span>
      Total Photos
    </div>

    <div class="col-lg-2 col-lg-offset-1 info-block">
      <span>{{ format_bytes(Photo::sum('filesize')) }}</span>
      Disk Used
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <h2>Latest Photos</h2>
      </div>

      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Uploaded At</th>
          <th>Name</th>
          <th>Filename</th>
          <th>Filesize</th>
          <th>Actions</th>
        </tr>

        @foreach(Photo::take(10)->orderBy('created_at', 'DESC')->get() as $photo)
          <tr>
            <td>{{ $photo->id }}</td>
            <td>{{ $photo->created_at->toDayDateTimeString() }}</td>
            <td>{{{ $photo->name }}}
            <td>{{ $photo->filename }}</td>
            <td>{{ format_bytes($photo->filesize) }}</td>
            <td>
              @if($photo->deleted_at == null)
                <a href="{{ URL::to('/admin/photo/edit/' . $photo->id) }}" class="btn btn-info">Edit</a>
                <a href="{{ URL::to('/admin/photo/delete/' . $photo->id) }}" class="btn btn-danger">Delete</a>
              @else
                <a href="{{ URL::to('/admin/photo/restore/' . $photo->id) }}" class="btn btn-success">Restore</a>
              @endif
            </td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>

@endsection
