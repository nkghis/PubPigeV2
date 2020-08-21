<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
//Route::resource('users','UserController');



/* Auth for API and Get Personal Access Token*/
Route::post('login', 'Auth\AuthController@login')->name('login');



/* Auth for API Auth route*/
Route::group(['middleware' => ['auth:api']],function (){

    Route::resource('campagnes','CampagneController')->only([
        'index', 'store'
    ]);
    Route::resource('clients','ClientController')->only([
        'index', 'store'
    ]);
    Route::resource('visuels','VisuelController')->only([

        'index', 'store'
    ]);
    /*Route::resource('marques','MarqueController');
    Route::resource('produits','ProduitController');
    Route::resource('regies','RegieController');*/
    Route::resource('users','UserController');

    Route::get('logout', 'Auth\AuthController@logout');
    Route::get('user', 'Auth\AuthController@user');

});
