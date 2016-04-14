<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tons de Lua - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('backend-assets/dist/css/plugins/select2.min.css') }}">
    <link rel="stylesheet" href="{{ url('backend-assets/dist/css/plugins/ladda-themeless.min.css') }}">
    <link rel="stylesheet" href="{{ url('backend-assets/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ url('backend-assets/dist/css/skins/skin-black.min.css') }}">

    @stack('styles')
    <link rel="stylesheet" href="{{ url('backend-assets/dist/css/custom.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-black sidebar-mini">
    <div class="wrapper">
        @include('admin.modules.header')

        @include('admin.modules.sidebar')

        @yield('content')

        <footer class="main-footer">
            <div class="pull-right">
                <strong>Developed by <a target="_blank" href="http://iamfreee.github.com">Carlos Florêncio</a></strong>
            </div>
            <strong>Copyright © {{ date('Y') }} </strong> All rights reserved.
        </footer>
    </div>

    <!-- jQuery 2.2.0 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="{{ url('backend-assets/dist/js/app.min.js') }}"></script>
    <script src="{{ url('backend-assets/dist/js/anchorMethod.js') }}"></script>
    <script src="{{ url('backend-assets/dist/js/plugins/select2.full.min.js') }}"></script>
    <script src="{{ url('backend-assets/dist/js/plugins/spin.min.js') }}"></script>
    <script src="{{ url('backend-assets/dist/js/plugins/ladda.min.js') }}"></script>
    <script>
        //alert auto close
        $(".alert").delay(4000).slideUp(200, function() {
            $(this).alert('close');
        });
        //alert close on click
        $(".alert").on('click', function () {
           $(this).remove();
        });

        $('.select2').select2();

        Ladda.bind('.loading-state', { timeout: 3000 } );
    </script>
    @stack('scripts')
</body>
</html>