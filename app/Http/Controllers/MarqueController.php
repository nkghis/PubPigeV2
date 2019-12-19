<?php

namespace App\Http\Controllers;

use App\Client;
use App\Marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Marque $marque)
    {
        $result = $marque->listMarqueClient();
        return view('marques.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        return view('marques.create', compact('clients'));
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
            'marque-name' => 'required',
            'client-name' => 'required',
        ]);
        $m = Marque::latest()->first();
        $code = $m->code +1;
        //dd($code);
        $marques = new Marque();
        $marques->code = $code;
        $marques->libelle = $request->input('marque-name');
        $marques->Code_Client = $request->input('client-name');
        $marques->save();
        return redirect()->route('marques.index')->with('success', 'La marque a été ajouté avec succès | '.$marques->libelle );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function show(Marque $marque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marques = Marque::find($id);
        $client = Client::find($marques->Code_Client);
        $clients = Client::all();
        return view('marques.edit', compact('clients', 'client', 'marques'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'marque-name' => 'required',
            'client-name' => 'required',
        ]);

        $marques = Marque::find($id);
        $marques->libelle = $request->input('marque-name');
        $marques->Code_Client = $request->input('client-name');
        $marques->save();
        return redirect()->route('marques.index')->with('success','Marque mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Marque::find($id)->delete();
        return redirect()->route('marques.index')->with('success','Suppression effectué avec succès');
    }
}
