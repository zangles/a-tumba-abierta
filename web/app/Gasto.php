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
}
