@extends('app')

@section('content')
    <?php
    use Carbon\Carbon;
    ?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Gastos</h2>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{ route('gastos.create') }}" class="btn btn-primary">Agregar Gasto</a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Registro de gastos mensuales</h5></span>
                    </div>
                    <div class="ibox-content">
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
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Mes</th>
                                    <th>Gasto</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($result as $r)
                                    <tr>
                                        <?php
                                            $dt = Carbon::parse($r->created_at);
                                        ?>
                                        <td>{{ $dt->month . " - " . $dt->year }}</td>
                                        <td>{!! \App\Donation::convertGoldToString(\App\Donation::convertToGold($r->gasto))  !!}</td>
                                        <td class="text-right" style="width: 70px">
                                            <a href="{{ url('gastos/detail/'.$r->created_at) }}" class="btn btn-info">Ver detalle</a>
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