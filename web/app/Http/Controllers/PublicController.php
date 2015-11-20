<?php

namespace App\Http\Controllers;

use App\Http\Requests\addPlayerRequest;
use App\Player;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    public function blackList()
    {
        $players = Player::where('status',Player::BLACK_LIST)->get();
        return view('public.blacklist',compact('players'));
    }
}
