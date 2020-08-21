<?php

namespace App\Http\Controllers;

use App\Campagne;
use App\Client;
use App\Http\Resources\CampagneResource;
use App\Marque;
use App\Produit;
use Illuminate\Http\Request;

class CampagneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Campagne $campagne, Request $request)
    {
        $result = $campagne->listCampagne();

        if ($request->is('api/*'))
        {
            ///return CampagneResource::collection($result);
            return response()->json($result, 201);
        }
        else
        {
            return view('campagnes.index', compact('result'));
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marques = Marque::all();
        $clients = Client::all();
        $produits = Produit::all();
        return view('campagnes.create', compact('marques','clients', 'produits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'campagne-name' => 'required',
            /*'dp-campagne' => 'required',
            'fp-campagne' => 'required',
            'code-pays' => 'required',
            'etat-campagne' => 'required',
            'duree-campagne' => 'required',*/
            'client-name' => 'required',
            'produit-name' => 'required',
            'marque-name' => 'required',
        ]);

        $c = Campagne::latest()->first();

        if ($c == null)
        {
            $code = 1;

        }
        else{

            $code = $c->code + 1;
        }


        $campagne = new Campagne();
        $campagne->code = $code;
        $campagne->libelle = $request->input('campagne-name');
        $campagne->DP_Campagne = $request->input('dp-campagne');
        $campagne->FP_Campagne = $request->input('fp-campagne');
        $campagne->Code_Pays = $request->input('code-pays');
        $campagne->Etat_Campagne = $request->input('etat-campagne');
        $campagne->Duree_Camp = $request->input('duree-campagne');
        $campagne->Code_Client = $request->input('client-name');
        $campagne->Code_Produit = $request->input('produit-name');
        $campagne->Code_Marque = $request->input('marque-name');
        $campagne->save();

        if ($request->is('api*'))
        {
            return new CampagneResource($campagne, 201);
        }
        else{
            return redirect()->route('campagnes.index')->with('success', 'Campagne ajouté avec succès | '.$campagne->libelle);
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $campagnes = Campagne::find($id);
        $marques = Marque::all();
        $clients = Client::all();
        $produits = Produit::all();
        $marque = Marque::find($campagnes->Code_Marque);
        $client = Client::find($campagnes->Code_Client);
        $produit = Produit::find($campagnes->Code_Produit);
        return view('campagnes.edit', compact('campagnes', 'marques', 'clients', 'produits', 'marque', 'produit', 'client'));

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
        $this->validate($request, [
            'campagne-name' => 'required',
            'dp-campagne' => 'required',
            'fp-campagne' => 'required',
            'code-pays' => 'required',
            'etat-campagne' => 'required',
            'duree-campagne' => 'required',
            'client-name' => 'required',
            'produit-name' => 'required',
            'marque-name' => 'required',
        ]);

        $campagne = Campagne::find($id);
        $campagne->libelle = $request->input('campagne-name');
        $campagne->DP_Campagne = $request->input('dp-campagne');
        $campagne->FP_Campagne = $request->input('fp-campagne');
        $campagne->Code_Pays = $request->input('code-pays');
        $campagne->Etat_Campagne = $request->input('etat-campagne');
        $campagne->Duree_Camp = $request->input('duree-campagne');
        $campagne->Code_Client = $request->input('client-name');
        $campagne->Code_Produit = $request->input('produit-name');
        $campagne->Code_Marque = $request->input('marque-name');
        $campagne->save();
        return redirect()->route('campagnes.index')->with('success', 'Campagne mis à jour avec succès | '.$campagne->libelle);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $campagne = Campagne::find($id);
        $libelle = $campagne->libelle;
        $campagne->delete();

        return redirect()->route('campagnes.index')->with('success', 'Campagne suprimée avec succès | '.$libelle);
    }
}
