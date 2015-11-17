<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\testGW2;
use Illuminate\Http\Request;


Route::get('/azs',function(){
    return view('html.index');
});

Route::post('/azs',function(Request $request){
    $a = new testGW2();
    dd($a->run($request->get('html')));

});


Route::get('/', function(){
    return redirect ('auth/login');
});
Route::get('/home', function(){
    return redirect ('players');
});
Route::get('/test',function(){
    $service = new PhpGw2Api\Service(__DIR__ . '/cache', 3600);
    $service->returnAssoc(true);
    $items = $service->getItems();

    $item = $service->getGuildDetails(array('guild_name' => 'A Tumba Abierta'));
    var_dump($item);
});


Route::get('/home', [
    'uses' => 'HomeController@index',
    'as'   => 'home'
]);

Route::get('logout', [
    'uses' => 'Auth\AuthController@getLogout',
    'as'   => 'logout'
]);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::get('players/active/{player}', 'PlayerController@active');
Route::get('gastos/detail/{date}', 'GastosController@detail');

Route::resource('players', 'PlayerController');
Route::resource('gastos', 'GastosController');
Route::get('donation/add/{player}', 'DonationController@add');
Route::post('donation/save/', 'DonationController@save');
Route::get('donation/user/{player}', 'DonationController@user');
Route::get('donation/recaudacion', 'DonationController@recaudacionMensual');



