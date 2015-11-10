


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login</title>

    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg" style="background: url('{{ asset('/img/bg000.jpg') }}'); background-position: center">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div style="margin-top: 200px">

        </div>
        <div style="background-color: #E5E5E6; padding: 15px; border-radius: 15px">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    Por favor corrige los siguientes errores:<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h3>Welcome to IN+</h3>
            <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <p>Login in. To see it in action.</p>
            <form class="m-t" role="form" action="{{ url('auth/login') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Username" name="email" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required="" name="password">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="#"><small>Forgot password?</small></a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{ asset('/js/jquery-2.1.1.js') }}"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>

</body>

</html>
