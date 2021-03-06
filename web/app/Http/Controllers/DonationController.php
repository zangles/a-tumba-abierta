<?php

namespace App\Http\Controllers;

use App\Donation;
use App\Gasto;
use App\Player;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DonationController extends Controller
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
    public function index()
    {
        return view('donations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add($player_id)
    {
        $player = Player::findOrFail($player_id);

        return view('donations.create',compact('player'));

    }

    public function save(Request $request)
    {
        $don = new Donation();
        $don->player_id = $request->input('id');
        $don->donation = Donation::convertToCopper($request->input('oro'),$request->input('plata'),$request->input('cobre'));
        $don->save();

        return redirect('players');
    }

    public function user($player_id)
    {
        $player = Player::findOrFail($player_id);
        $result = DB::select('select month(created_at) mes,created_at,sum(donation) donation from donations where player_id = :id group by month(created_at)', ['id' => $player_id]);

        return view('donations.user',compact('player','result'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function recaudacionMensual()
    {
        $result = Donation::getDonationsGeneral();
        $gastos = Gasto::getGastosTotales();

        $dt = Carbon::now();
        $gastosAnuales = Gasto::getGastosAnuales($dt->year);
        $ingresosAnuales = Donation::getDonacionesAnuales($dt->year);
        return view('donations.recaudacion',compact('result','gastos','gastosAnuales','ingresosAnuales'));
    }
}
