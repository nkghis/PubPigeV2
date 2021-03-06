<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/test', function () {
    $user = \App\User::find(2);
    $client = \App\Client::find(10);
    //dd($client);
    $user->clients()->attach($client);
    //$client->users()->attach($user);
    echo 'test reusii';

    //$product->categories()->attach($category);
});*/

Route::get('/', function () {
    if(Auth::check()){
        //return view('dashboard');
        return redirect()->route('home');
    }
    return view('auth.login');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/map', 'CarteController@map_sidebar')->name('sidebar');

Route::group(['middleware' => 'auth'], function () {

    Route::get('mytoken', 'TokenController@index')->name('token');
    Route::get('maps/bycommune', 'CarteController@bycommune')->name('maps.bycommune');
    Route::get('maps/{id}', 'CarteController@localisation')->name('maps.localisation');

    Route::post('/getuser', 'ProfileController@getuser')->name('getuser');
    Route::get('/list', 'ProfileController@index')->name('user.list');


    Route::get('/userList', 'UserController@usersList')->name('user.list');

    Route::post('/visuelList', 'VisuelController@visuelList')->name('visuel.list');
    Route::post('/visuels/dupliquer', 'VisuelController@dupliquer')->name('visuel.dupliquer');
    Route::post('/visuels/multi', 'VisuelController@multi')->name('visuel.multi');

	Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
   
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

   // Route::get('/map', 'CarteController@map_sidebar')->name('sidebar');
    Route::resource('roles','RoleController');
    Route::resource('clients','ClientController');
    Route::resource('access','AccesController');
    Route::resource('campagnes','CampagneController');
    Route::resource('marques','MarqueController');
    Route::resource('produits','ProduitController');
    Route::resource('visuels','VisuelController');
    Route::resource('cartes','CarteController');
    Route::resource('regies','RegieController');
    //represente la table commune avec les coordonnées geographique
    Route::resource('coms','ComController');
});

