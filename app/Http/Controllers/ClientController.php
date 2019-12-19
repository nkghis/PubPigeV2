<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$result = Client::latest()->paginate();
        $result = Client::all();
        return view('clients.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
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
            'raison-soc' => 'required',
            'code' => 'unique:clients,code',
        ]);

        if ($request->input('code')!='')
        {
            //dd('1');
            dd($request->has('code'));
            $client = new Client();
            $client->Raison_Soc = $request->input('raison-soc');
            $client->code = $request->input('code');

        }

        else
        {
            //dd(0);

            $client = new Client();
            $client->Raison_Soc = $request->input('raison-soc');

        }

        $client->save();
        return redirect()->route('clients.index')->with('success','Client crée avec succès');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $clients = Client::find($id);
        return view('clients.edit', compact('clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request, [
            'raison-soc' => 'required',
        ]);

        $client = Client::find($id);
        $client->Raison_Soc = $request->input('raison-soc');
        $client->save();
        return redirect()->route('clients.index')->with('success','Client mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::find($id)->delete();
        return redirect()->route('clients.index')->with('success','Client spprimé avec succès');
    }
}
