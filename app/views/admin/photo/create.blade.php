@extends('admin.template')

@section('admin-head')
@endsection

@section('admin-javascript')
<script type="text/javascript" src="{{ URL::asset('/assets/js/dropzone.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    var dz = new Dropzone(document.body, {
      url: '{{ URL::to('/admin/photo/store') }}',
      paramName: 'photo',
      previewsContainer: '.upload-area',
      clickable: false
    });
  });
</script>
@endsection

@section('admin-content')

  <div class="page-header">
    <h1>Upload a new photo <small>Drag and drop photos to upload</small></h1>
  </div>

  <div class="upload-area">

  </div>

@endsection
