<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $table = 'donations';

    protected $fillable = ['player_id', 'donation'];

    public function player()
    {
        return $this->belongsTo('App\Player');
    }

    public static function convertToCopper($gold,$silver,$cooper)
    {
        if($cooper == 0) {
            $total = 100;
            $total += ($silver-1) * 100;
        }else{
            $total = $cooper;
            $total += $silver * 100;
        }

        $total += $gold*10000;

        return $total;
    }

    public static function convertToGold($copper)
    {
        $rtrn = [
            'gold' => 0,
            'silver' => 0,
            'copper' => 0,
        ];

        $g = $copper%10000;
        $rtrn['gold'] = ($copper-$g)/10000;
        $s = $g%100;
        $rtrn['silver'] = ($g-$s)/100;
        $rtrn['copper'] = $s;

        return $rtrn;
    }

    public static function convertGoldToString($donation)
    {
        $rtrn = $donation['gold']." <img src='".asset('/img/g.png')."'> ".$donation['silver']." <img src='".asset('/img/s.png')."'> ".$donation['copper']." <img src='".asset('/img/c.png')."'> ";
        return $rtrn;
    }

    public static function getDonacionMensualGeneral($date)
    {
        $dt = Carbon::parse($date);
        $dt2 = Carbon::parse($date);
        $inicio = $dt->startOfMonth();
        $fin = $dt2->endOfMonth();

        $players = Player::all();
        $rtrn = 0;
        foreach ($players as $p) {
            $rtrn += (int) $p->donation()->where('created_at','>=',$inicio)->where('created_at','<=',$fin)->sum('donation');
        }

        $rtrn = Donation::convertToGold($rtrn);
        return $rtrn;
    }

    public static function getDonationsGeneral()
    {
        $result = \DB::select('select month(created_at) mes,created_at,sum(donation) donation from donations group by month(created_at)');
        return $result;
    }



}
