@extends('app')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Nuevo Gasto</h2>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{ route('gastos.index') }}" class="btn btn-danger">Volver</a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Informacion del gasto</h5></span>
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
                    <form action="{{ route('gastos.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="number" min="0" class="form-control" name="oro" placeholder="" aria-describedby="basic-addon2">
                                        <span class="input-group-addon" id="basic-addon2">
                                            <img src="{{ asset('/img/g.png') }}" alt="" title="Oro">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="number" min="0" max="99" type="text"  name="plata" class="form-control" placeholder="" aria-describedby="basic-addon2">
                                        <span class="input-group-addon" id="basic-addon2">
                                            <img src="{{ asset('/img/s.png') }}" alt="" title="Plata">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" type="number" min="0" max="99"  name="cobre" class="form-control" placeholder="" aria-describedby="basic-addon2">
                                        <span class="input-group-addon" id="basic-addon2">
                                            <img src="{{ asset('/img/c.png') }}" alt=""  title="Cobre">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Comentarios</label>
                                        <textarea name="comentarios" id="" cols="30" rows="10" class="form-control" style="width: 100%"></textarea>
                                    </div>
                                </div>
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