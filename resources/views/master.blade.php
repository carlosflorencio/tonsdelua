<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>Tons de Lua - @yield('title')</title>

        <meta name="description" content="Tons de Lua">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"/>
        <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ url(elixir('css/app.css')) }}">
        @stack('styles')
        <!-- /Styles -->
    </head>
    <body data-responsejs='{
      "create": [{
        "prop": "width",
        "prefix": "min-width- r src",
        "breakpoints": [0, 768, 992, 1200]
      }]
    }'>
        <!--[if lte IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        @include('modules.topbar')

        @yield('content')


        @include('modules.footer')

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-2.2.1.min.js"><\/script>')</script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        @stack('scripts')
        <script src="{{ url(elixir('js/all.js')) }}"></script>
        <!-- /Scripts -->
    </body>
</html>

