<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    protected $table = 'gastos';

    protected $fillable = ['amount', 'comments'];


    public static function getGastosTotales()
    {
        $result = \DB::select('select month(created_at) mes,created_at,sum(amount) gasto from gastos group by month(created_at)');
        return $result;
    }

    public static function getGastosAnuales($year)
    {
        $gastos = self::getYearGastos($year);
        $rtrn = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        foreach ($gastos as $d) {
            $coins = Donation::convertToGold($d->amount);
            $rtrn[ (int) $d->mes - 1 ] = $coins['gold'];
        }

        return $rtrn;
    }

    public static function getGastoMensualGeneral($date)
    {
        $dt = Carbon::parse($date);
        $dt2 = Carbon::parse($date);
        $inicio = $dt->startOfMonth();
        $fin = $dt2->endOfMonth();

        $gastos = Gasto::all();
        $rtrn = 0;
        foreach ($gastos as $p) {
            $rtrn += (int) $p->donation()->where('created_at','>=',$inicio)->where('created_at','<=',$fin)->sum('amount');
        }

        $rtrn = Donation::convertToGold($rtrn);
        return $rtrn;
    }

    public function getDetalleGatos($date)
    {
        $rtrn = self::getMesQuery($date);
        return $rtrn;
    }

    private function getMesQuery($date)
    {
        $dt = Carbon::parse($date);
        $dt2 = Carbon::parse($date);
        $inicio = $dt->startOfMonth();
        $fin = $dt2->endOfMonth();
        $rtrn = $this->where('created_at','>=',$inicio)->where('created_at','<=',$fin)->get();

        return $rtrn;
    }

    public static function getYearGastos($year)
    {
        $dt = Carbon::createFromDate($year, 1, 1);
        $dt2 = Carbon::createFromDate($year, 1, 1);
        $inicio = $dt->startOfYear();
        $fin = $dt2->endOfYear();
        $result = \DB::select("select month(created_at) mes,created_at,sum(amount) amount from gastos where created_at BETWEEN '".$inicio."' and '".$fin."' group by month(created_at)");
        return $result;
    }
}
