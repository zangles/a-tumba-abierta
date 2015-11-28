<?php

namespace App\Http\Controllers;

use App\Http\Requests\addPlayerRequest;
use App\Player;
use App\Postulantes;
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
        $players = Player::where('status','<>',Player::BLACK_LIST)->get();
        return view('player.index',compact('players'));
    }

    public function black()
    {
        $players = Player::where('status',Player::BLACK_LIST)->get();
        return view('player.black',compact('players'));
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
        $player->status = $request->input('status');
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
            return redirect('donation/user/'.$id);
        }else{
            $player->delete();
            return redirect('players');
        }
    }

    public function active($id)
    {
        $player = Player::findOrFail($id);
        $player->status = Player::ENABLED;
        $player->save();

        return redirect('donation/user/'.$id);
    }

    public function addBlackList()
    {
        $blacklist = true;
        return view('player.create',compact('blacklist'));
    }

    public function blacklist($id)
    {
        $player = Player::findOrFail($id);
        if($player->status == Player::BLACK_LIST){
            $player->status = Player::ENABLED;
        }else{
            $player->status = Player::BLACK_LIST;
        }

        $player->save();

        return redirect('donation/user/'.$id);
    }

    public function postulantes()
    {
        $postulantes = Postulantes::all();

        return view('player.postulantes',compact('postulantes'));
    }

    public function postulante($id)
    {
        $postulante = Postulantes::findOrFail($id);
        return view('player.postulante',compact('postulante'));
    }

    public function aceptarPostulante($id)
    {
        $postulante = Postulantes::findOrFail($id);

        if($postulante->wasInClan()){
            $p = Player::where('account',$postulante->account)->get();

            $player = Player::findOrFail($p[0]->id);
            $player->status = Player::ENABLED;
            $player->save();
        }else{
            $player = new Player();
            $player->account = $postulante->account;
            $player->comments = '';
            $player->status = Player::ENABLED;
            $player->save();
        }

        $postulante->delete();
        return redirect('players/postulantes');
    }
}
