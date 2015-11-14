@extends('app')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Jugadores</h2>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{ route('players.create') }}" class="btn btn-primary">Agregar jugador</a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Listado de usaurio</h5></span>
                    </div>
                    <div class="ibox-content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Cuenta</th>
                                    <th>Anotaciones</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($players as $p)
                                    <tr>
                                        <td style="width:25%">{{ $p->account }}</td>
                                        <td style="width:50%">{{ $p->comments }}</td>
                                        <td>
                                            <a href="{{ url('/donation/add/'.$p->id) }}" class="btn btn-success">Agregar Oro</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection