<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>cosmakers</title>

    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

    <!-- styles -->
    @yield('style')
</head>
<body>

    @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('/js/jquery-2.1.1.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    @yield('scripts')

</body>
</html>