@extends('app')

@section('content')
    <?php
        use Carbon\Carbon;
    ?>
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
            <div class="col-md-10 col-md-offset-1">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Listado de usaurio</h5></span>
                    </div>
                    <div class="ibox-content">
                        <table class="table" id="usuarios">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cuenta</th>
                                    <th>Anotaciones</th>
                                    <th>Donacion mensual</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($players as $p)
                                    <tr @if($p->status == \App\Player::DISABLED) class="danger" @endif>
                                        <td style="width:40px">{{ $p->id }}</td>
                                        <td style="width:150px">{{ $p->account }}</td>
                                        <td>
                                            {!!  nl2br($p->comments)  !!}
                                            <a href="{{ route('players.edit',$p) }}" class="btn btn-white" style="float: right" title="Editar">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </td>
                                        <td style="width:15%" class="text-right">{!! \App\Donation::convertGoldToString($p->getDonacionMensual( date('Y-m-d', time()) ))  !!}</td>
                                        <td style="width:15%" class="text-right"></td>
                                        {{--<td style="width:15%" class="text-right">oro</td>--}}
                                        <td style="width: 350px" class="text-right">
                                            <a href="{{ url('/donation/add/'.$p->id) }}" class="btn btn-success">Agregar Oro</a>
                                            <a href="{{ url('/donation/user/'.$p->id) }}" class="btn btn-info">Detalle</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!!  $players->render()  !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('/js/plugins/dataTables/jquery.dataTables.js') }}"></script>
    <script>
        $(document).ready(function() {
            //$('#usuarios').DataTable();

            $('.delete').click(function(){
                if(confirm('Esta seguro?')){
                    ("#deleteform").submit();
                }
                return false;
            });
        } );
    </script>
@endsection

@section('style')
    {{--<link rel="stylesheet" href="{{ asset('/css/plugins/dataTables/dataTables.bootstrap.css') }}">--}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
@endsection