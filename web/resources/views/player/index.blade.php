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
                <a href="{{ url('players/black/') }}" class="btn btn-success">Ver Black List</a>
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
                                <th class="hidden-xs">Anotaciones</th>
                                <th>Donacion mensual</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($players as $p)
                                <tr @if($p->status == \App\Player::DISABLED) class="danger" @endif>
                                    <td style="width:5%">{{ $p->id }}</td>
                                    <td style="width:15%">{{ $p->account }}</td>
                                    <td class="hidden-xs">
                                        {!!  nl2br($p->comments)  !!}
                                        <a href="{{ route('players.edit',$p) }}" class="btn btn-white" style="float: right" title="Editar">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </td>
                                    <td style="width:15%" class="text-right">{!! \App\Donation::convertGoldToString($p->getDonacionMensual( date('Y-m-d', time()) ))  !!}</td>
                                    <td style="width: 100px" class="text-right">
                                        @if($p->status == \App\Player::ENABLED)
                                            <a href="{{ url('/donation/add/'.$p->id) }}" class="btn btn-success" title="Agregar Oro"><img src='{{ asset('/img/g.png') }}'></a>
                                        @endif
                                        <a href="{{ url('/donation/user/'.$p->id) }}" class="btn btn-info" title="Detalle">
                                            <i class="fa fa-info-circle"></i>
                                        </a>
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

@section('scripts')
    <script src="{{ asset('/js/plugins/dataTables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('/js/plugins/dataTables/dataTables.responsive.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#usuarios').DataTable({
                responsive: true,
                "aoColumns": [
                    null,
                    { "sType": "html" },
                    null,
                    { "sType": "html" },
                    null
                ],
                columnDefs: [ { orderable: false, targets: [3,4] }]
            });

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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('/css/plugins/dataTables/dataTables.responsive.css') }}">
@endsection