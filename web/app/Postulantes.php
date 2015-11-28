<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postulantes extends Model
{
    protected $table = 'postulantes';

    protected $fillable = ['account', 'mensaje', 'f2p'];

    public function isInBlackList()
    {
        $result = \DB::select('select * from players where status = '.Player::BLACK_LIST." and UPPER(account) = '".strtoupper($this->account)."'");
        return (count($result)>0 );
    }

    public function wasInClan()
    {
        $result = \DB::select('select * from players where status != '.Player::BLACK_LIST." and UPPER(account) = '".strtoupper($this->account)."'");
        return (count($result)>0 );
    }
}
