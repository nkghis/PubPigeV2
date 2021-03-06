<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Campagne;
use App\Client;
use App\Com;
use App\GmapLocation;
use App\Http\Resources\VisuelResource;
use App\Regie;
use App\User;
use App\UserClient;
use App\Visuel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisuelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Visuel $visuel, Request $request)
    {
        if (Auth::user()->hasRole('Admin'))
        {
            $result = $visuel->listVisuels();

            $campagnes = Campagne::all();
            $communes = Com::all();
            $regies = Regie::all();



            if ($request->is('api/*'))
            {
                return response()->json($result, 201);

                //return VisuelResource::collection($result);

            }

            else{
                return view('visuels.index', compact('result','campagnes','communes', 'regies'));
            }

            //return view('visuels.index', compact('result','campagnes','communes', 'regies'));
        }

        else
        {
            $user_id = Auth::user()->id;
            $user_client = UserClient::where('user_id', '=', $user_id)->first();
            $client_id = $user_client->client_id;
            $result = $visuel->listVisuelsByClient($client_id);
            return view('visuels.index', compact('result'));
        }
        //return view('visuels.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $communes = Com::all();
        $campagnes = Campagne::all();
        $regies = Regie::all();
        return view('visuels.create', compact('communes', 'campagnes','regies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        if ($request->is('api/*'))
        {
            $rules = [
                'visuel-name' => 'required',
                /* 'visuel-part' => 'required',*/
                'commune-lat' => 'required',
                'commune-lng' => 'required',
                'image' => 'required',
                'commune-name' => 'required',
                'campagne-name' => 'required',
                'regie-name' => 'required',
            ];
            $input  =$request->all();

            $validator = Validator::make($input, $rules);
            if ($validator->fails())
            {
                return response()->json($validator->messages(), 400);
            }

            //Decode base 64 image
            $image = $request->image;  // your base64 encoded
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $filename = Str::random(10) . '.jpg';

            //Store image decode base 64 to staorage. disk argument can find at config/filesystems.php in local
            Storage::disk('i')->put($filename, base64_decode($image));

            //return 'test';

            if ($request->input('option')==false)
            {
                $concurent = 0;
                $confrere =0;
                $marqueur = 'red';
                //dd($marqueur);
            }
            else{
                if ($request->input('option') == 0)
                {
                    $concurent = 1;
                    $confrere =0;
                    $marqueur = 'yellow';
                    //dd($marqueur);
                }
                else{
                    $concurent = 0;
                    $confrere =1;
                    $marqueur = 'blue';
                    //dd($marqueur);
                }
            }


            $idcampagne = $request->input('campagne-name');
            $campagne = Campagne::find($idcampagne);
            $idclient = $campagne->Code_Client;
            $v = new Visuel();
            $v->emplacement = $request->input('visuel-name');
            $v->partdevoix = $request->input('visuel-part');
            $v->latittude = $request->input('commune-lat'); /*$request->input('commune-lat')*/;
            $v->longitude = $request->input('commune-lng');/*$request->input('commune-lng');*/
            $v->image = $filename; /*$request->input('image-name');*/
            $v->idclient = $idclient;
            $v->idcampagne = $request->input('campagne-name');
            $v->idcommune = $request->input('commune-name');
            $v->idregie = $request->input('regie-name');
            $v->estconcurent = $concurent;
            $v->estconfrere = $confrere;
            $v->marqueur = $marqueur;
            $v->save();

            return response()->json($v, 201);
        }
        else{


            if($request->has('check-coordonnees')){
                //Checkbox checked

                $this->validate($request, [
                    'visuel-name' => 'required',
                    /* 'visuel-part' => 'required',*/
                    'commune-lat' => 'required',
                    'commune-lng' => 'required',
                    'image' => 'required|file|image|mimes:jpeg,jpg|max:2048',
                    'commune-name' => 'required|not_in:0',
                    'campagne-name' => 'required|not_in:0',
                    'regie-name' => 'required|not_in:0',
                ]);

            }else{


                //Checkbox not checked

                $this->validate($request, [
                    'visuel-name' => 'required',
                    /* 'visuel-part' => 'required',*/
                    /*'commune-lat' => 'required',
                    'commune-lng' => 'required',*/
                    'image' => 'required|file|image|mimes:jpeg,jpg|max:2048',
                    'commune-name' => 'required|not_in:0',
                    'campagne-name' => 'required|not_in:0',
                    'regie-name' => 'required|not_in:0',
                ]);
            }



            //dd($request);

          /*  if ($request->input('option')==false)
            {
                $concurent = 0;
                $confrere =0;
                $marqueur = 'red';
                //dd($marqueur);
            }
            else{
                if ($request->input('option') == 0)
                {
                    $concurent = 1;
                    $confrere =0;
                    $marqueur = 'yellow';
                    //dd($marqueur);
                }
                else{
                    $concurent = 0;
                    $confrere =1;
                    $marqueur = 'blue';
                    //dd($marqueur);
                }
            }*/

            $marqueur = $request->input('option');

            switch ($marqueur){
                case "red" :
                    $concurent = 0;
                    $confrere =0;
                  /*  $marqueur = $option;*/

                    break;
                case "yellow" :
                    $concurent = 1;
                    $confrere =0;
                  /*  $marqueur = $option;*/

                    break;
                case "blue" :
                    $concurent = 0;
                    $confrere =1;
                  /*  $marqueur = $option;*/

                    break;
            }

            //dd($marqueur, $concurent, $confrere);



            //$p = 'yellow';
            //dd($request);

            /*Get image file name original*/
            $filename = $request->file('image')->getClientOriginalName();

            //Store file
            $request->file('image')->storeAs('public/mesimages',$filename);

            //initialise GmapLocation
            $map = new GmapLocation();

            //Get Path of file
            $url ='storage/mesimages/'.$filename;

            //Check If file existing
            $imglocation = $map->get_image_location($url);
            if ($imglocation != false)
            {
                $idcampagne = $request->input('campagne-name');
                $campagne = Campagne::find($idcampagne);
                $idclient = $campagne->Code_Client;
                $v = new Visuel();
                $v->emplacement = $request->input('visuel-name');
                $v->partdevoix = $request->input('visuel-part');
                $v->latittude = $imglocation['latitude']; /*$request->input('commune-lat')*/;
                $v->longitude = $imglocation['longitude'];/*$request->input('commune-lng');*/
                $v->image = $filename; /*$request->input('image-name');*/
                $v->idclient = $idclient;
                $v->idcampagne = $request->input('campagne-name');
                $v->idcommune = $request->input('commune-name');
                $v->idregie = $request->input('regie-name');
                $v->estconcurent = $concurent;
                $v->estconfrere = $confrere;
                $v->marqueur = $marqueur;
                $v->save();
                return redirect()->route('visuels.index')->with('success', 'Visuel ajouté avec succès |'.$v->emplacement);
            }
            else
            {
                if($request->has('check-coordonnees')){
                    //Checkbox checked

                    $idcampagne = $request->input('campagne-name');
                    $campagne = Campagne::find($idcampagne);
                    $idclient = $campagne->Code_Client;

                    $filename = $request->file('image')->getClientOriginalName();
                    $request->file('image')->storeAs('public/mesimages',$filename);
                    //$v->image = $filename;

                    $v = new Visuel();
                    $v->emplacement = $request->input('visuel-name');
                    $v->partdevoix = $request->input('visuel-part');
                    $v->latittude = $request->input('commune-lat');
                    $v->longitude = $request->input('commune-lng');
                    $v->image = $filename; /*$request->input('image-name');*/
                    $v->idclient = $idclient;
                    $v->idcampagne = $request->input('campagne-name');
                    $v->idcommune = $request->input('commune-name');
                    $v->idregie = $request->input('regie-name');
                    $v->estconcurent = $concurent;
                    $v->estconfrere = $confrere;
                    $v->marqueur = $marqueur;
                    $v->save();
                    return redirect()->route('visuels.index')->with('success', 'Visuel ajouté avec succès |'.$v->emplacement);



                }else {


                    return redirect()->route('visuels.index')->with('danger', 'DESOLE !!! La photo du visuel nommée ne contient pas des données de localisation.');//Checkbox not checked

                }


            }
        }











    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Visuel  $visuel
     * @return \Illuminate\Http\Response
     */
    public function show(Visuel $visuel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Visuel  $visuel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visuels = Visuel::find($id);
        $campagnes = Campagne::all();
        $regies = Regie::all();
        $communes = Com::all();
        //$campagne = Campagne::find($visuels->idcampagne);
        //dd($campagne);
        //$commune = Com::find($visuels->idcommune);
        //$regie = Regie::find($visuels->idregie);
        return view('visuels.edit', compact('visuels','campagnes','regies', 'communes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Visuel  $visuel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        $this->validate($request, [
            'visuel-name' => 'required',
           /* 'visuel-part' => 'required',*/
            'commune-lat' => 'required',
            'commune-lng' => 'required',
            'image' => 'file|image|mimes:jpeg,jpg|max:2048',
            'commune-name' => 'required|not_in:0',
            'campagne-name' => 'required|not_in:0',
            'regie-name' => 'required|not_in:0',
        ]);

        //dd('test');

        $image = $request->file('image');
        $oldimage = $request->input('images');
        $v = Visuel::find($id);
        if ($image != '')
        {
            $filename = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/mesimages',$filename);
            $v->image = $filename;
        }
        else
        {
            $v->image = $oldimage;
        }

        $idcampagne = $request->input('campagne-name');
        $campagne = Campagne::find($idcampagne);
        $idclient = $campagne->Code_Client;
        $v->emplacement = $request->input('visuel-name');
        $v->partdevoix = $request->input('visuel-part');
        $v->latittude = $request->input('commune-lat');
        $v->longitude = $request->input('commune-lng');
        //$v->image = $filename; /*$request->input('image-name');*/
        $v->idclient = $idclient;
        $v->idcampagne = $request->input('campagne-name');
        $v->idcommune = $request->input('commune-name');
        $v->idregie = $request->input('regie-name');
        $v->marqueur = $request->input('option');
        $v->save();
        return redirect()->route('visuels.index')->with('success', 'Visuel mis à jour avec succès |'.$v->emplacement);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Visuel  $visuel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visuel = Visuel::find($id);
        $v = $visuel->emplacement;
        $visuel->delete();
        return redirect()->route('visuels.index')->with('success', 'Visuel suprimé avec succès | '.$v);
    }

    public function visuelList(Request $request)
    {

        $visuel = new Visuel();

        //initialise array
        $columns = array(
            0 => 'id',
            1 => 'emplacement',
            2 => 'partdevoix',
            3 => 'image',
            4 => 'client',
            5 => 'campagne',
            6 => 'commune',
            7 => 'regie',
            8 => 'action',
        );
        // get input
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        //If user as Admin role
        if (Auth::user()->hasRole('Admin'))
        {
            //get all visuels
            $result = $visuel->listVisuelsJson($start,$limit,$order,$dir);

            //get total count
            $totalData = Visuel::count();

            if(empty($request->input('search.value'))) {

                // //get all visuels
                $result = $visuel->listVisuelsJson($start, $limit, $order, $dir);
                //$totalFiltered = $result->count();
                $totalFiltered = Visuel::count();


            }

            else{
                //get serach input
                $search = $request->input('search.value');
                //get all visuels
                $result = $visuel->listVisuelsSearchJson($start, $limit, $order, $dir, $search);
                //Total count filter
                $totalFiltered = $visuel->CountlistVisuelsSearchJson($start, $limit, $order, $dir, $search);

            }


        }

        else
        {
            //Get id client
            $user_id = Auth::user()->id;
            $user_client = UserClient::where('user_id', '=', $user_id)->first();
            $client_id = $user_client->client_id;

            //Display all visuel by idclient
            $result = $visuel->listVisuelsByClientJson($client_id,$start,$limit,$order,$dir);

            $totalData = $visuel->CountlistVisuelsByClientJson($client_id,$start,$limit,$order,$dir);

            //if search field is null
            if(empty($request->input('search.value'))) {

                $result = $visuel->listVisuelsByClientJson($client_id,$start,$limit,$order,$dir);
                $totalFiltered = $visuel->CountlistVisuelsByClientJson($client_id,$start,$limit,$order,$dir);


            }
            //if search field is not null
            else{
                $search = $request->input('search.value');
                $result = $visuel->listVisuelsByClientSearchJson($client_id,$start, $limit, $order, $dir, $search);
                $totalFiltered = $visuel->CountlistVisuelsByClientSearchJson($client_id,$start, $limit, $order, $dir, $search);

            }

        }
        //initialise array
        $data = array();

        if ($result){
            foreach ($result as $vs){
                //create data
                $nestedData['id'] = $vs->id;

                //$emplacement = $vs->emplacement;
                $nestedData['emplacement'] = $vs->emplacement;
                $nestedData['partdevoix'] = $vs->partdevoix;
                $imagepath = $vs->image;
                $nestedData['image'] = view('visuels.shared._vueImageForDatatableServerSide', compact('imagepath'))->render();
                $nestedData['client'] = $vs->client;
                $nestedData['campagne'] = $vs->campagne;
                $nestedData['commune'] = $vs->commune;
                $nestedData['regie'] = $vs->regie;

                //Recuperation de identifiant
                $id = $vs->id;

                //Appel de la vue associe la variable id
                $nestedData['action'] = view('visuels.shared._actionForDatatableServerside', compact('id'))->render();

                //get data
                $data[] = $nestedData;

            }
        }
        //Create json data
        $json_data = array(
            "draw"          => intval($request->input('draw')),
            "recordsTotal"  => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"          => $data
        );
        echo json_encode($json_data);

    }


    public function dupliquer(Request $request)
    {
        $this->validate($request, [
            'campagne-named' => 'required|not_in:0',
            'campagne-name-dupliquer' => 'required|not_in:0',
        ]);

        //idcampagne campagne à dupliquer
        $cad = $request->input('campagne-named');

        //idcampagne dupliquer vers campagne
        $dvc = $request->input('campagne-name-dupliquer');

        //liste des campagnes a dupluquer
        $visuels = Visuel::where('idcampagne', '=', $cad)->get();

        //dd($visuels->count());

        //get campagne à dupliquer
        $cadCampagne = Campagne::find($cad);

        //dupliquer vers campagne
        $dvcCampagne = Campagne::find($dvc);

        //dd($dvc);

        foreach ($visuels as $visuel)
        {
            $v = new Visuel();

            $v->emplacement = $visuel->emplacement;
            $v->partdevoix = $visuel->partdevoix;
            $v->latittude = $visuel->latittude;
            $v->longitude = $visuel->longitude;
            $v->image = $visuel->image;
            $v->idclient = $visuel->idclient;
            $v->idcampagne = $dvc;
            $v->idcommune = $visuel->idcommune;
            $v->idregie = $visuel->idregie;
            $v->estconcurent = $visuel->estconcurent;
            $v->estconfrere = $visuel->estconfrere;
            $v->marqueur = $visuel->marqueur;
            $v->save();

        }

        return redirect()->route('visuels.index')->with('success', 'La campagne ['.$cadCampagne->libelle.'] a été dupliquée avec succès vers la campagne ['.$dvcCampagne->libelle.'] |'.$visuels->count().' visuel(s) ajouté(s)');
        //dd($campagnes);
    }


    public function multi(Request $request)
    {

        $validator = $this->validate($request, [



            'image' => 'required',
            //'image.*' => 'mimes:jpeg,jpg|max:2048',
            'commune-name' => 'required|not_in:0',
            'campagne-name' => 'required|not_in:0',
            'regie-name' => 'required|not_in:0',
        ]);
        //dd($validator);

        //dd($request->all());

        $files = $request->file('image');
        //dd($files);
        $idcommune = $request->input('commune-name');
        $idcampagne = $request->input('campagne-name');
        $idregie = $request->input('regie-name');
        $campagne = Campagne::find($idcampagne);
        //dd($campagne);
        $idclient = $campagne->Code_Client;


        foreach ($files as $file)
        {

            $fullfilename = $file->getClientOriginalName();

            //get filename without extension
            $file_info = pathinfo($fullfilename);
            $filename = $file_info['filename'];


            //Store file
            $file->storeAs('public/mesimages',$fullfilename);

            //initialise GmapLocation
            $map = new GmapLocation();

            //Get Path of file
            $url ='storage/mesimages/'.$fullfilename;

            $imglocation = $map->get_image_location($url);
            if ($imglocation != false)
            {
                $v = new Visuel();
                $v->emplacement = $filename;
                $v->partdevoix = 10;
                $v->latittude = $imglocation['latitude']; /*$request->input('commune-lat')*/;
                $v->longitude = $imglocation['longitude'];
                $v->image = $fullfilename;
                $v->idclient = $idclient;
                $v->idcampagne = $idcampagne;
                $v->idcommune = $idcommune;
                $v->idregie = $idregie;
                $v->estconcurent = 0;
                $v->estconfrere = 0;
                $v->marqueur = 'red';
                $v->save();

            }

            else
            {
                $tableau[] = $filename;
            }

        }

        if(empty($tableau))
        {
            return redirect()->route('visuels.index')->with('success', 'les visuels ont été ajoutés avec succès |');
        }

        else {

            $list = implode(",", $tableau);
            return redirect()->route('visuels.index')->with('danger', 'DESOLE !!! Les visuels suivants '.$list.' ne contiennent pas des données de localisation.');

        }





    }
}
