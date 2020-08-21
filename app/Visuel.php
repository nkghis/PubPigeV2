<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Visuel extends Model
{
    protected $table = 'panneauxes';
    protected $primaryKey = 'idPanneaux';
    //public $incrementing = false;

    public function listVisuels()
    {
        $result = DB::table('panneauxes')
            ->join('clients', 'clients.code', '=', 'panneauxes.idclient')
            ->join('campagnes', 'campagnes.code', '=', 'panneauxes.idcampagne')
            ->join('coms', 'coms.id', '=', 'panneauxes.idcommune')
            ->join('regies', 'regies.code', '=', 'panneauxes.idregie')
            ->select(
                'panneauxes.idPanneaux as id',
                'panneauxes.emplacement as emplacement',
                'panneauxes.partdevoix as partdevoix',
                'panneauxes.latittude as latitude',
                'panneauxes.longitude',
                'panneauxes.image',
                'clients.Raison_Soc as client',
                'campagnes.libelle as campagne',
                'coms.name as commune',
                'regies.Raison_Soc as regie'
                    )
            ->get();
        return $result;
    }

    public function listVisuelsByClient($client)
    {
        $result = DB::table('panneauxes')
            ->join('clients', 'clients.code', '=', 'panneauxes.idclient')
            ->join('campagnes', 'campagnes.code', '=', 'panneauxes.idcampagne')
            ->join('coms', 'coms.id', '=', 'panneauxes.idcommune')
            ->join('regies', 'regies.code', '=', 'panneauxes.idregie')
            ->where('panneauxes.idclient','=',$client)
            ->select(
                'panneauxes.idPanneaux as id',
                'panneauxes.emplacement as emplacement',
                'panneauxes.partdevoix as partdevoix',
                'panneauxes.latittude as latitude',
                'panneauxes.longitude',
                'panneauxes.image',
                'clients.Raison_Soc as client',
                'campagnes.libelle as campagne',
                'coms.name as commune',
                'regies.Raison_Soc as regie'
            )
            ->get();
        return $result;
    }

    public function listVisuelsJson($off, $lim, $ord, $d)
    {
        $result = DB::table('panneauxes')
            ->join('clients', 'clients.code', '=', 'panneauxes.idclient')
            ->join('campagnes', 'campagnes.code', '=', 'panneauxes.idcampagne')
            ->join('coms', 'coms.id', '=', 'panneauxes.idcommune')
            ->join('regies', 'regies.code', '=', 'panneauxes.idregie')
            ->offset($off)
            ->limit($lim)
            ->orderBy($ord,$d)
            ->select(
                'panneauxes.idPanneaux as id',
                'panneauxes.emplacement as emplacement',
                'panneauxes.partdevoix as partdevoix',
                'panneauxes.latittude as latitude',
                'panneauxes.longitude',
                'panneauxes.image',
                'clients.Raison_Soc as client',
                'campagnes.libelle as campagne',
                'coms.name as commune',
                'regies.Raison_Soc as regie'
            )
            ->get();
        return $result;
    }

    public function listVisuelsByClientJson($client, $off, $lim, $ord, $d)
    {
        $result = DB::table('panneauxes')
            ->join('clients', 'clients.code', '=', 'panneauxes.idclient')
            ->join('campagnes', 'campagnes.code', '=', 'panneauxes.idcampagne')
            ->join('coms', 'coms.id', '=', 'panneauxes.idcommune')
            ->join('regies', 'regies.code', '=', 'panneauxes.idregie')
            ->where('panneauxes.idclient','=',$client)
            ->offset($off)
            ->limit($lim)
            ->orderBy($ord,$d)
            ->select(
                'panneauxes.idPanneaux as id',
                'panneauxes.emplacement as emplacement',
                'panneauxes.partdevoix as partdevoix',
                'panneauxes.latittude as latitude',
                'panneauxes.longitude',
                'panneauxes.image',
                'clients.Raison_Soc as client',
                'campagnes.libelle as campagne',
                'coms.name as commune',
                'regies.Raison_Soc as regie'
            )
            ->get();
        return $result;
    }

    //Count
    public function CountlistVisuelsByClientJson($client, $off, $lim, $ord, $d)
    {
        $result = DB::table('panneauxes')
            ->join('clients', 'clients.code', '=', 'panneauxes.idclient')
            ->join('campagnes', 'campagnes.code', '=', 'panneauxes.idcampagne')
            ->join('coms', 'coms.id', '=', 'panneauxes.idcommune')
            ->join('regies', 'regies.code', '=', 'panneauxes.idregie')
            ->where('panneauxes.idclient','=',$client)
            ->offset($off)
            ->limit($lim)
            ->orderBy($ord,$d)
            /*->select(
                'panneauxes.idPanneaux as id',
                'panneauxes.emplacement as emplacement',
                'panneauxes.partdevoix as partdevoix',
                'panneauxes.latittude as latitude',
                'panneauxes.longitude',
                'panneauxes.image',
                'clients.Raison_Soc as client',
                'campagnes.libelle as campagne',
                'coms.name as commune',
                'regies.Raison_Soc as regie'
            )*/
            ->count();
        return $result;
    }


    public function listVisuelsByClientSearchJson($client, $off, $lim, $ord, $d, $search)
    {
        $result = DB::table('panneauxes')
            ->join('clients', 'clients.code', '=', 'panneauxes.idclient')
            ->join('campagnes', 'campagnes.code', '=', 'panneauxes.idcampagne')
            ->join('coms', 'coms.id', '=', 'panneauxes.idcommune')
            ->join('regies', 'regies.code', '=', 'panneauxes.idregie')
            ->where('panneauxes.idclient','=',$client)
            ->where('emplacement', 'like', "%{$search}%")
            ->orWhere('clients.Raison_Soc','like',"%{$search}%")
            ->orWhere('campagnes.libelle','like',"%{$search}%")
            ->orWhere('coms.name','like',"%{$search}%")
            ->orWhere('regies.Raison_Soc','like',"%{$search}%")
            ->offset($off)
            ->limit($lim)
            ->orderBy($ord,$d)
            ->select(
                'panneauxes.idPanneaux as id',
                'panneauxes.emplacement as emplacement',
                'panneauxes.partdevoix as partdevoix',
                'panneauxes.latittude as latitude',
                'panneauxes.longitude',
                'panneauxes.image',
                'clients.Raison_Soc as client',
                'campagnes.libelle as campagne',
                'coms.name as commune',
                'regies.Raison_Soc as regie'
            )
            ->get();
        return $result;
    }

    //Count
    public function CountlistVisuelsByClientSearchJson($client, $off, $lim, $ord, $d, $search)
    {
        $result = DB::table('panneauxes')
            ->join('clients', 'clients.code', '=', 'panneauxes.idclient')
            ->join('campagnes', 'campagnes.code', '=', 'panneauxes.idcampagne')
            ->join('coms', 'coms.id', '=', 'panneauxes.idcommune')
            ->join('regies', 'regies.code', '=', 'panneauxes.idregie')
            ->where('panneauxes.idclient','=',$client)
            ->where('emplacement', 'like', "%{$search}%")
            ->orWhere('clients.Raison_Soc','like',"%{$search}%")
            ->orWhere('campagnes.libelle','like',"%{$search}%")
            ->orWhere('coms.name','like',"%{$search}%")
            ->orWhere('regies.Raison_Soc','like',"%{$search}%")
            ->offset($off)
            ->limit($lim)
            ->orderBy($ord,$d)
            /*->select(
                'panneauxes.idPanneaux as id',
                'panneauxes.emplacement as emplacement',
                'panneauxes.partdevoix as partdevoix',
                'panneauxes.latittude as latitude',
                'panneauxes.longitude',
                'panneauxes.image',
                'clients.Raison_Soc as client',
                'campagnes.libelle as campagne',
                'coms.name as commune',
                'regies.Raison_Soc as regie'
            )*/
            ->count();
        return $result;
    }

    public function listVisuelsSearchJson($off, $lim, $ord, $d, $search)
    {
        $result = DB::table('panneauxes')
            ->join('clients', 'clients.code', '=', 'panneauxes.idclient')
            ->join('campagnes', 'campagnes.code', '=', 'panneauxes.idcampagne')
            ->join('coms', 'coms.id', '=', 'panneauxes.idcommune')
            ->join('regies', 'regies.code', '=', 'panneauxes.idregie')
            ->where('emplacement', 'like', "%{$search}%")
            ->orWhere('clients.Raison_Soc','like',"%{$search}%")
            ->orWhere('campagnes.libelle','like',"%{$search}%")
            ->orWhere('coms.name','like',"%{$search}%")
            ->orWhere('regies.Raison_Soc','like',"%{$search}%")
            ->offset($off)
            ->limit($lim)
            ->orderBy($ord,$d)
            ->select(
                'panneauxes.idPanneaux as id',
                'panneauxes.emplacement as emplacement',
                'panneauxes.partdevoix as partdevoix',
                'panneauxes.latittude as latitude',
                'panneauxes.longitude',
                'panneauxes.image',
                'clients.Raison_Soc as client',
                'campagnes.libelle as campagne',
                'coms.name as commune',
                'regies.Raison_Soc as regie'
            )
            ->get();
        return $result;
    }

    //Count
    public function CountlistVisuelsSearchJson($off, $lim, $ord, $d, $search)
    {
        $result = DB::table('panneauxes')
            ->join('clients', 'clients.code', '=', 'panneauxes.idclient')
            ->join('campagnes', 'campagnes.code', '=', 'panneauxes.idcampagne')
            ->join('coms', 'coms.id', '=', 'panneauxes.idcommune')
            ->join('regies', 'regies.code', '=', 'panneauxes.idregie')
            ->where('emplacement', 'like', "%{$search}%")
            ->orWhere('clients.Raison_Soc','like',"%{$search}%")
            ->orWhere('campagnes.libelle','like',"%{$search}%")
            ->orWhere('coms.name','like',"%{$search}%")
            ->orWhere('regies.Raison_Soc','like',"%{$search}%")
            ->offset($off)
            ->limit($lim)
            ->orderBy($ord,$d)
            ->count();
        return $result;
    }

    public function campagne()
    {
        return $this->belongsTo('App\Campagne');
    }

    public function com()
    {
        return $this->belongsTo('App\Com');
    }

    public function regie()
    {
        return $this->belongsTo('App\Regie');
    }
}
