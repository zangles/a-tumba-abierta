<?php

namespace App;

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

}
