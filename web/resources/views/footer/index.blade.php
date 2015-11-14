<div class="footer">
    <div class="pull-right">
        <strong>Oro recaudado este mes:</strong> {!! \App\Donation::convertGoldToString(\App\Donation::getDonacionMensualGeneral( date('Y-m-d', time()) ))  !!}
    </div>
    <div>
        <strong>Copyright</strong> Zangles ( Zaphir Sky )
    </div>
</div>