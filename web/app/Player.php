<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'players';

    protected $fillable = ['account', 'comments'];

    public function donation()
    {
        return $this->hasMany('App\Donation');
    }
}
