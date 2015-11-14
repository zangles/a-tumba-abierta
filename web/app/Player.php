<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'players';

    protected $fillable = ['account', 'comments'];

    public function donation()
    {
        return $this->hasMany('App\Donation');
    }

    public function getDonacionMensual($date)
    {
        $dt = Carbon::parse($date);
        $dt2 = Carbon::parse($date);
        $inicio = $dt->startOfMonth();
        $fin = $dt2->endOfMonth();

        $rtrn = $this->donation()->where('created_at','>=',$inicio)->where('created_at','<=',$fin)->sum('donation');
        $rtrn = Donation::convertToGold($rtrn);
        return $rtrn;
    }
}
