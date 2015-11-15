<div class="footer">
    <div class="pull-right">
        <a href="{{ url('donation/recaudacion') }}"><strong>Oro recaudado este mes:</strong></a> {!! \App\Donation::convertGoldToString(\App\Donation::getDonacionMensualGeneral( date('Y-m-d', time()) ))  !!}
    </div>
    <div>
        <strong>Copyright</strong> Zangles ( Zaphir Sky )
    </div>
</div>