<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postulantes extends Model
{
    protected $table = 'postulantes';

    protected $fillable = ['account', 'mensaje', 'f2p'];
}
