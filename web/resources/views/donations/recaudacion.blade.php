@extends('app')

@section('content')
    <?php
    use Carbon\Carbon;
    ?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Recaudacion</h2>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{ route('players.index') }}" class="btn btn-danger">Volver</a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-md-12">
                @include('donations.partials.graficoRecaudacion')
            </div>
            <div class="col-md-6">
                @include('donations.partials.recaudacionesMensuales')
            </div>
            <div class="col-md-6">
                @include('donations.partials.gastosMensuales')
            </div>
        </div>
    </div>
@endsection

@section('style')
@endsection

@section('scripts')
    <script src="{{ asset('/js/plugins/chartJs/Chart.min.js') }}"></script>

    <script>
        $(document).ready(function(){
            var data = {
                labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre","Octubre","Noviembre","Diciembre"],
                datasets: [
                    {
                        label: "Ingresos",
                        fillColor: "rgba(39, 174, 96,0.2)",
                        strokeColor: "rgba(39, 174, 96,1)",
                        pointColor: "rgba(39, 174, 96,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(39, 174, 96,1)",
                        data: {{json_encode($ingresosAnuales)}}
                    },
                    {
                        label: "Gastos",
                        fillColor: "rgba(192, 57, 43,0.2)",
                        strokeColor: "rgba(192, 57, 43,1.0)",
                        pointColor: "rgba(192, 57, 43,1.0)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(192, 57, 43,1.0)",
                        data: {{json_encode($gastosAnuales)}}
                    }
                ]
            };
            var options = {
                multiTooltipTemplate: "<%= datasetLabel %> - <%= value %>"
            };

            var ctx = document.getElementById("lineChart").getContext("2d");
            ctx.canvas.width  = $('.graph01').width();
            var myLineChart = new Chart(ctx).Line(data,options);
        });
    </script>
@endsection