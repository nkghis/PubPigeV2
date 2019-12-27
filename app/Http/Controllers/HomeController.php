<?php

namespace App\Http\Controllers;

use App\Campagne;
use App\Client;
use App\Com;
use App\Marque;
use App\Produit;
use App\Regie;
use App\User;
use App\UserClient;
use App\Visuel;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        if (Auth::user()->hasRole('Admin'))
        {
            $data = array();

            $user = User::count();
            $client = Client::count();
            $campagne = Campagne::count();
            $regie = Regie::count();
            $visuel = Visuel::count();
            $marque = Marque::count();
            $produit = Produit::count();
            $commune = Com::count();

            array_push($data, $user, $client,$campagne,$regie,$visuel,$marque,$produit,$commune);

            //dd($data);
            return view('dashboard', compact('data'));

        }

        else
        {
            $data = array();
            $user_id = Auth::user()->id;
            $user_client = UserClient::where('user_id', '=', $user_id)->first();
            $client_id = $user_client->client_id;
            $visuel = Visuel::where('idclient', '=', $client_id)->count();
            $campagne = Campagne::where('Code_Client', '=', $client_id)->count();

            array_push($data,$visuel,$campagne);

            return view('dashboard', compact('data'));

        }
        //return view('dashboard');
    }
}
