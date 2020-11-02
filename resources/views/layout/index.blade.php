<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>@yield('title')</title>

        <!-- Style -->
        <link href="{{ asset('/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/assets/bootstrap/custome/app.css') }}" rel="stylesheet">
        @yield('css')

    </head>

    <body class="bg-blue-5">

        <div class="container-sm mw-720 bg-white mh-934">
            @if(Session::get('user'))
                <a href="{{ url('/logout') }}" class="btn btn-danger float-right">Logout</a>
            @endif
            <!-- Content -->
            @yield('content')
        </div>

    </body>

    <!-- Javascript -->
    @stack('script')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="{{ asset('/assets/bootstrap/js/bootstrap.min.js') }}"></script>

    @yield('script')
</html>
