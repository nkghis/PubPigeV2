<?php

namespace App\Http\Controllers;

use App\Com;

use Illuminate\Http\Request;

class ComController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Com::all();
        return view('coms.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coms.create');
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
            'commune-id' => 'required',
            'commune-name' => 'required',
            'commune-lat' => 'required',
            'commune-lng' => 'required',
            'commune-zoom' => 'required',

        ]);

        $com = new Com();
        $com->id = $request->input('commune-id');
        $com->name = $request->input('commune-name');
        $com->lat = $request->input('commune-lat');
        $com->lng = $request->input('commune-lng');
        $com->zoom = $request->input('commune-zoom');
        $com->save();
        return redirect()->route('coms.index')->with('success', 'Commune ajoutée avec succès | '.$com->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Com  $com
     * @return \Illuminate\Http\Response
     */
    public function show(Com $com)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Com  $com
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coms = Com::find($id);
        //dd($coms);
        return view('coms.edit', compact('coms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Com  $com
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
           /* 'commune-id' => 'required',*/
            'commune-name' => 'required',
            'commune-lat' => 'required',
            'commune-lng' => 'required',
            'commune-zoom' => 'required',

        ]);

        $com = Com::find($id);
        //$com->id = $request->input('commune-id');
        $com->name = $request->input('commune-name');
        $com->lat = $request->input('commune-lat');
        $com->lng = $request->input('commune-lng');
        $com->zoom = $request->input('commune-zoom');
        $com->save();
        return redirect()->route('coms.index')->with('success', 'Commune mis à jour avec succès | '.$com->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Com  $com
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $com = Com::find($id);
        $name = $com->name;
        $com->delete();
        return redirect()->route('coms.index')->with('success', 'Commune supprimée avec succes | '.$name);
    }
}
