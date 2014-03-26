@extends('template')

@section('page-title')
@endsection

@section('head')
@endsection

@section('javascript')
<script type="text/javascript" src="{{ URL::asset('/assets/js/masonry.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/assets/js/imagesloaded.min.js') }}"></script>
<script type="text/javascript">
  var container;
  var doingAjax = false;
  var ids = [];

  function loadContent()
  {
    if (doingAjax === true)
      return;

    doingAjax = true;

    $.post('{{ URL::to('/load-content') }}', {
      'ids': ids
    }).success(function(data) {

      $.each(data, function(i, item) {
        var div = $('<div class="col-lg-2 col-md-3 col-sm-3 col-xs-4 photo" data-id="' + item.id + '"><img class="img-responsive" alt="' + item.name + '" src="{{ URL::to('/photos') }}/' + item.filename + '"></div>');

        ids.push(item.id);

        div.imagesLoaded(function() {
          container.append(div).fadeIn(1500);
          container.masonry('appended', div).masonry();

          doingAjax = false;
        });

      });

    }).fail(function() {
      console.log('Error loading more content, maybe there is no more content available to load?');
      doingAjax = false;
    });
  }

  $(document).ready(function() {
    $(document).imagesLoaded(function() {
      container = $('#masonry');

      container.masonry({
        columnWidth: '.photo',
        itemSelector: '.photo'
      });

      masonryInit = true;

      if ($('#masonry').height() < $(window).height()) {
        loadContent();
      }

      container.masonry('on', 'layoutComplete', function(masonry, items)
      {
        if ($('#masonry').height() < $(window).height()) {
          loadContent();
        }
      });
    });

    $(window).scroll(function() {
      if ($(window).scrollTop() + $(window).height() == $(document).height()) {
        loadContent();
      }
    });
  });
</script>
@endsection

@section('content')

  <div id="masonry"></div>

@endsection
