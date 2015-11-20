<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    const ENABLED = 1;
    const DISABLED = 0;
    const BLACK_LIST = 3;

    protected $table = 'players';

    protected $fillable = ['account', 'comments'];

    public static function filterAndPaginate($account="")
    {
        $users = Player::query();
        if(!is_null($account)){
            $users = $users->where('account',$account);
        }
        $users = $users->orderBy('id', 'ASC')
            ->paginate(10);

        return $users;
    }

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

    public function hasDonations()
    {
        return ($this->donation()->count() > 0);
    }
}
