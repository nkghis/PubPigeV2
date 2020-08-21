<?php

namespace App\Http\Controllers;

use App\Regie;
use Illuminate\Http\Request;

class RegieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Regie::all();
        return view('regies.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('regies.create');
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
            'regie-name' => 'required',

        ]);
        $regie = new Regie();
        $r = Regie::latest()->first();
        if ($r ==null)
        {
            $code = 1;
        }
        else{
            $code = $r->code +1;
        }

        $regie->code = $code;
        $regie->Raison_Soc = $request->input('regie-name');
        $regie->save();
        return redirect()->route('regies.index')->with('success', 'Régie ajoutée avec succès | '.$regie->Raison_Soc);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Regie  $regie
     * @return \Illuminate\Http\Response
     */
    public function show(Regie $regie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Regie  $regie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regies = Regie::find($id);
        return view('regies.edit', compact('regies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Regie  $regie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'regie-name' => 'required',
        ]);

        $regie = Regie::find($id);
        $regie->Raison_Soc = $request->input('regie-name');
        $regie->save();
        return redirect()->route('regies.index')->with('success', 'Régie mis à jour avec succès | '.$regie->Raison_Soc);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Regie  $regie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $regie = Regie::find($id);
        $var = $regie->Raison_Soc;
        $regie->delete();
        return redirect()->route('regies.index')->with('success', 'Régie supprimée avec succès | '.$var);
    }
}
