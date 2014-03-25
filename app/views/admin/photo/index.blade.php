@extends('admin.template')

@section('admin-head')
@endsection

@section('admin-javascript')
@endsection

@section('admin-content')

  <div class="page-header">
    <h1>Photos</h1>
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

    @foreach($photos as $photo)
      <tr>
        <td>{{ $photo->id }}</td>
        <td>{{ $photo->created_at->toDayDateTimeString() }}</td>
        <td>{{{ $photo->name }}}</td>
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

  {{ $photos->links() }}

@endsection
