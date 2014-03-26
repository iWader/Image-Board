<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('page-title', 'Image-Board')</title>
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/bootstrap.min.css') }}" type="text/css" media="screen">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('head')

  </head>

  <body>

    @if($errors->count() > 0)
      <div class="container">
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all('<li>:message</li>') as $error)
              {{ $error }}
            @endforeach
          </ul>
        </div>
      </div>
    @endif

    @if(Session::has('successes') && Session::get('successes')->count() > 0)
      <div class="container">
        <div class="alert alert-success">
          <ul>
            @foreach(Session::get('successes')->all('<li>:message</li>') as $success)
              {{ $success }}
            @endforeach
          </ul>
        </div>
      </div>
    @endif

    @yield('content')

    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

    @yield('javascript')

  </body>
</html>
