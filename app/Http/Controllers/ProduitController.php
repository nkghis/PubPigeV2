<?php

namespace App\Http\Controllers;

use App\Marque;
use App\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Produit $produit)
    {
        $result = $produit->listProduitMarque();
        return view('produits.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marques = Marque::all();
        return view('produits.create', compact('marques'));
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
            'produit-name' => 'required',
            'marque-name' => 'required',
        ]);

        $produit = new Produit();
        $p = Produit::latest()->first();
        $code = $p->code +1;
        $produit->code = $code;
        $produit->libelle = $request->input('produit-name');
        $produit->Code_Marque = $request->input('marque-name');
        $produit->save();
        return redirect()->route('produits.index')->with('success', 'Le produit a été ajoute avec succès | '.$produit->libelle );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produit = Produit::find($id);
        $marque = Marque::find($produit->Code_Marque);
        $marques = Marque::all();
        return view('produits.edit', compact('produit','marques', 'marque'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'produit-name' => 'required',
            'marque-name' => 'required',
        ]);

        $produit = Produit::find($id);
        $produit->libelle = $request->input('produit-name');
        $produit->Code_Marque = $request->input('marque-name');
        $produit->save();
        return redirect()->route('produits.index')->with('success','produit mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produit::find($id)->delete();
        return redirect()->route('produits.index')->with('success','Suppression effectué avec succès');
    }
}
