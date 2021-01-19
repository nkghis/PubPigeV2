<?php

namespace App\Http\Controllers;

use App\Campagne;
use App\Carte;
use App\Com;
use App\UserClient;
use App\Visuel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commune = Com::all();
        $visuel = 0;

        if (Auth::user()->hasRole('Admin'))
        {
            $campagne = Campagne::all();
        }
        else{

            $user_id = Auth::user()->id;
            //dd($user_id);
            $user_client = UserClient::where('user_id', '=', $user_id)->first();
            //dd($user_client);
            $client_id = $user_client->client_id;

            $campagne = Campagne::where('Code_Client', '=',$client_id )->get();
            //dd($campagne);

        }
        return view('cartes.index', compact('commune','campagne','visuel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    public function bycommune(Request $request)
    {
        $id = $request->input('commune');
        $idcampagne = $request->input('campagne');
        $v = new Carte();
        $commune = Com::all();
        //$campagne = Campagne::all();
        $user_id = Auth::user()->id;
        $user_client = UserClient::where('user_id', '=', $user_id)->first();


        if (Auth::user()->hasRole('User'))
        {
            $client_id = $user_client->client_id;
            $campagne = Campagne::where('Code_Client', '=',$client_id )->get();
            $client_id = $user_client->client_id;
            if ($id == 0 && $idcampagne == 0)
            {

                return redirect()->route('cartes.index');

            }

            else
            {
                if ($id != 0 && $idcampagne != 0)
                {
                    $visuel = $v->allVisuels($client_id, $idcampagne, $id);
                    $cs = Com::find($id);
                    $cm = Campagne::find($idcampagne);
                }
                else{
                    if ($id == 0 && $idcampagne !=0)
                    {
                        $visuel = $v->allVisuelsAllCommunes($client_id,$idcampagne);
                        $cs = new Com();
                        $cs->id = 0;
                        $cs->name = 'All communes';
                        $cm = Campagne::find($idcampagne);
                    }
                    else{

                        $visuel = $v->allVisuelsAllCampagne($client_id,$id);
                        $cm = new Campagne();
                        $cm->code = 0;
                        $cm->libelle = 'All campagnes';
                        $cs = Commune::find($id);
                    }
                }
            }

            //return view('cartes.filter', compact('commune', 'visuel', 'cs', 'cm', 'campagne'));
        }

        else{
            $campagne = Campagne::all();
            if ($id == 0 && $idcampagne == 0)
            {

                return redirect()->route('cartes.index');

            }

            else
            {
                if ($id != 0 && $idcampagne != 0)
                {
                    $visuel = $v->allVisuelsNoClient( $idcampagne, $id);
                    $cs = Com::find($id);
                    $cm = Campagne::find($idcampagne);
                }
                else{
                    if ($id == 0 && $idcampagne !=0)
                    {
                        $visuel = $v->allVisuelsNoClientAllCommunes($idcampagne);
                        $cs = new Com();
                        $cs->id = 0;
                        $cs->name = 'All communes';
                        $cm = Campagne::find($idcampagne);
                    }
                    else{

                        $visuel = $v->allVisuelsAllNoClientCampagne($id);
                        $cm = new Campagne();
                        $cm->code = 0;
                        $cm->libelle = 'All campagnes';
                        $cs = Commune::find($id);
                    }
                }
            }

            //return view('cartes.filter', compact('commune', 'visuel', 'cs', 'cm', 'campagne'));
        }

        return view('cartes.filter', compact('commune', 'visuel', 'cs', 'cm', 'campagne'));







    }

    public function localisation($id, Carte $c)
    {
        $c = new Carte();
        if (Auth::user()->hasRole('Admin'))
        {
            //$v = new Visuel();
            //$v = Visuel::find($id);


            $visuel = $c->findVisuels($id);

           //dd($visuel);
            $n = $visuel[0]->idcommune;
            //dd($n);
            $cs = Com::find($n);


        }
        else{

            $user_id = Auth::user()->id;
            $user_client = UserClient::where('user_id', '=', $user_id)->first();
            $client_id = $user_client->client_id;
            $visuel = $c->findByClientVisuels($id,$client_id);
            $n = $visuel[0]->idcommune;
            $cs = Com::find($n);
        }

        return view('cartes.localisation', compact('visuel', 'cs'));
    }

    public function map_sidebar(Visuel $v){

        $visuel = $v->listVisuels();
        //dd($v);
        return view('map-sidebar-test', compact('visuel'));
    }
}
