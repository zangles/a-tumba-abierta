@extends('app')

@section('content')
    <?php
    use Carbon\Carbon;
    ?>
    <div class="row wrapper border-bottom white-bg page-heading">

        <div class="col-sm-4">
            <h2>Detalle del Postulante {{ $postulante->account }}</h2>
        </div>
        <div class="col-sm-4">
            <h2>
                @if ($postulante->isInBlackList())
                    <span for="" class="label label-danger" style="font-size: 20px">
                        ESTA EN LA BLACK LIST
                    </span >
                @endif

                @if ($postulante->wasInClan())
                    <span for="" class="label label-info " style="font-size: 20px">
                        PERTENECIO AL CLAN
                    </span>
                @endif
            </h2>
        </div>
        <div class="col-sm-4">
            <div class="title-action">
                <a href="{{ URL::previous() }}" class="btn btn-danger" style="margin-left: 50px">Volver</a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Informacion del postulante</h5>
                        <div class="ibox-tools">
                            @if($postulante->f2p)
                                <span for="" class="label label-warning ">No Tiene Expansion</span>
                            @else
                                <span for="" class="label label-primary ">Tiene Expansion</span>
                            @endif
                        </div>
                    </div>
                    <div class="ibox-content">
                        <p>
                            {{ $postulante->mensaje }}
                        </p>
                    </div>
                    <div class="ibox-footer text-right">
                        <form action="{{ url('players/postulantes/aceptar/'.$postulante->id) }}" style="display: inline-block" method="get">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary">PROS</button>
                        </form>
                        <form action="{{ route('postulate.destroy',$postulante) }}" id="deleteForm" style="display: inline-block" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-warning confirmDelete">WAC</button>
                            <button type="submit" class="btn btn-danger confirmDelete">Rechazar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.delete').click(function(){
                if(confirm('Esta seguro?')){
                    ("#deleteform").submit();
                }
                return false;
            });

            $(".confirmDelete").click(function(){
                if(confirm('Esta Seguro?')){
                    $("#deleteForm").submit();
                }
                return false;
            })
        } );
    </script>
@endsection