<?php
use Carbon\Carbon;
?>
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Recaudaciones Mensuales del clan</h5></span>
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
                <th>Donacion</th>
            </tr>
            </thead>
            <tbody>
            @foreach($result as $r)
                <tr>
                    <?php
                    $dt = Carbon::parse($r->created_at);
                    ?>
                    <td>{{ $dt->month . " - " . $dt->year }}</td>
                    <td>{!! \App\Donation::convertGoldToString(\App\Donation::convertToGold($r->donation))  !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>