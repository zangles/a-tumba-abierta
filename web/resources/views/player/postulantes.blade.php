@extends('app')

@section('content')
    <?php
    use Carbon\Carbon;
    ?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Postulantes</h2>
        </div>
        <div class="col-sm-8">
            <div class="title-action">

            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Listado de Postulantes</h5></span>
                    </div>
                    <div class="ibox-content">
                        <table class="table" id="usuarios">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cuenta</th>
                                <th class="hidden-xs">Mensaje</th>
                                <th>Tiene Expansion</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($postulantes as $p)
                                    <tr>
                                        <td>{{ $p->id }}</td>
                                        <td>{{ $p->account }}</td>
                                        <td>{!!  nl2br($p->mensaje)  !!}</td>
                                        <td>{{ ($p->f2p)?"NO":"SI" }}</td>
                                        <td>
                                            <a href="{{ url('players/postulantes/'.$p->id) }}" class="btn btn-info" title="Detalle">
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
    <link rel="stylesheet" href="{{ asset('/css/plugins/dataTables/jquery.dataTable.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/plugins/dataTables/dataTables.responsive.css') }}">
@endsection