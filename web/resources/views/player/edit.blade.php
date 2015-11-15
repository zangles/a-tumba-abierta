@extends('app')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Agregar jugador</h2>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{ route('players.index') }}" class="btn btn-danger">Volver</a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Informacion del usuario</h5></span>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <p>Por favor corrige los errores:</p>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('players.update',$player) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="ibox-content">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cuenta</label>
                                <input type="text" class="form-control" disabled placeholder="Cuenta" value="{{ $player->account }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Comentarios</label>
                                <textarea name="comentarios" id="" class="form-control" cols="30" rows="10">{{ $player->comments }}</textarea>
                            </div>
                        </div>
                        <div class="ibox-footer text-right">
                            <button class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection