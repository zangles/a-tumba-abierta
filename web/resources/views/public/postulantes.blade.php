<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Postulate</title>


    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/plugins/switchery/switchery.css') }}" rel="stylesheet">

    <script src="{{ asset('/js/jquery-2.1.1.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('/js/inspinia.js') }}"></script>
    <script src="{{ asset('/js/plugins/pace/pace.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/switchery/switchery.js') }}"></script>
    <script>
        $(document).ready(function(){
            var elem = document.querySelector('.js-switch');
            var switchery = new Switchery(elem, { color: '#1AB394', secondaryColor: '#ED5565',jackColor: '#fcf45e', jackSecondaryColor: '#c8ff77' });
        });

    </script>

</head>
<body style="background-color:#F3F3F4;">
<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <div class="page-header text-center">
            <h1>Postulate para ingresar al Clan A tumba abierta</h1>
        </div>
    </div>
    <div class="col-md-10 col-md-offset-1">
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
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Informacion del jugador</h5>
            </div>
            <form action="{{ route('postulate.store') }}" method="post">
                {{ csrf_field() }}
                <div class="ibox-content">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Cuenta</label>
                        <input type="text" class="form-control" name="cuenta" value="{{ old('cuenta') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Soy Free to Play</label>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="f2p" class="js-switch" value="0" id="f2p" @if(!is_null(old('f2p')) and old('f2p') == true) checked @endif />
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Mensaje</label>
                        <textarea name="mensaje" id="" class="form-control" cols="30" rows="10">{{ old('mensaje') }}</textarea>
                    </div>
                </div>
                <div class="ibox-footer text-right">
                    <button type="submit" class="btn btn-primary">Postularse</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>