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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:api']],function (){

    Route::resource('campagnes','CampagneController');
    Route::resource('clients','ClientController');
    Route::resource('visuels','VisuelController');
    Route::resource('marques','MarqueController');
    Route::resource('produits','ProduitController');
    //Route::resource('communes','CommuneController');
    Route::resource('regies','RegieController');
});