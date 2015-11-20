@extends('app')

@section('content')
    <?php
    use Carbon\Carbon;
    ?>
    <div class="row wrapper border-bottom white-bg page-heading">

        <div class="col-sm-4">
            <h2>Detalle del jugador {{ $player->account }}</h2>
        </div>
        <div class="col-sm-8">
            <div class="title-action">


                <a href="{{ URL::previous() }}" class="btn btn-danger" style="margin-left: 50px">Volver</a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-md-12 text-center">
                @include('donations.partials.playerActions')
            </div>
            <div class="col-md-4">
                @include('donations.partials.playerDonations')
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
        } );
    </script>
@endsection