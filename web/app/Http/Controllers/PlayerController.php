<?php

namespace App\Http\Controllers;

use App\Http\Requests\addPlayerRequest;
use App\Player;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PlayerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$players = Player::filterAndPaginate($request->get('account'));
        $players = Player::all();
        return view('player.index',compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('player.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(addPlayerRequest $request)
    {
        $player = new Player();
        $player->account = $request->input('cuenta');
        $player->comments = $request->input('comentarios');
        $player->status = Player::ENABLED;
        $player->save();

        return redirect('players');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $player = Player::findOrFail($id);
        return view('player.edit',compact('player'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $player = Player::findOrFail($id);
        $player->comments = $request->input('comentarios');
        $player->save();

        return redirect('players');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $player = Player::findOrFail($id);
        if( $player->hasDonations() ){
            $player->status = Player::DISABLED;
            $player->save();
        }else{
            $player->delete();
        }

        return redirect('players');
    }

    public function active($id)
    {
        $player = Player::findOrFail($id);
        $player->status = Player::ENABLED;
        $player->save();

        return redirect('players');
    }
}
