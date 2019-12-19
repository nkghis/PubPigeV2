<?php

namespace App\Http\Controllers;

use App\Client;
use App\User;
use App\UserClient;
use Illuminate\Http\Request;

class AccesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserClient $userClient)
    {
        $result = $userClient->listUserClient();
        $res = UserClient::latest()->paginate();

        return view('acces.index',compact('result', 'res'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $users = User::all();
        $clients = Client::all();
        return view('acces.create',compact('users','clients'));
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

            'client-name' => 'required|not_in:0',
            'user-name' => 'required|not_in:0',

        ]);

        $idClient = $request->input('client-name');
        $idUser = $request->input('user-name');
        $us = User::find($idUser);
        $userclient = new UserClient();
        $userclient->user_id = $idUser;
        $userclient->client_id = $idClient;
        $userclient->save();
        return redirect()->route('access.index')->with('success','Accès accordé avec succès à l\'utilisateur | '.$us->email);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = UserClient::find($id);
        return view('acces.show',compact('$result'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = UserClient::find($id);
        $user = User::find($result->user_id);
        $client = Client::find($result->client_id);
        $users = User::all();
        $clients = Client::all();
        return view('acces.edit',compact('user','users','client','clients','result'));
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

            'client-name' => 'required|not_in:0',
            'user-name' => 'required|not_in:0',

        ]);

        $userclient = UserClient::find($id);
        $userclient->user_id = $request->input('user-name');
        $userclient->client_id = $request->input('client-name');
        $userclient->save();
        return redirect()->route('access.index')->with('success','Accès mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userclient = UserClient::find($id)->delete();
        //$userclient->destroy();
        return redirect()->route('access.index')->with('success','Suppression effectué avec succès');
    }
}
