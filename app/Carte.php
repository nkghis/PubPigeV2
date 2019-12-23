<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Carte extends Model
{
    public function allVisuels($client, $campagne, $commune)
    {
        $result = DB::table('panneauxes')
            ->join('clients', 'clients.code', '=', 'panneauxes.idclient')
            ->join('campagnes', 'campagnes.code', '=', 'panneauxes.idcampagne')
            ->join('coms', 'coms.id', '=', 'panneauxes.idcommune')
            ->join('regies', 'regies.code', '=', 'panneauxes.idregie')
            ->where('panneauxes.idclient','=',$client)
            ->where('panneauxes.idcampagne','=',$campagne)
            ->where('panneauxes.idcommune','=',$commune)
            ->select(
                'panneauxes.idPanneaux as id',
                'panneauxes.emplacement as emplacement',
                'panneauxes.partdevoix as partdevoix',
                'panneauxes.latittude as latitude',
                'panneauxes.longitude',
                'panneauxes.image',
                'panneauxes.marqueur',
                'clients.Raison_Soc as client',
                'campagnes.libelle as campagne',
                'coms.name as commune',
                'regies.Raison_Soc as regie'
            )
            ->get();
        return $result;
    }


    public function allVisuelsAllCommunes($client, $campagne)
    {
        $result = DB::table('panneauxes')
            ->join('clients', 'clients.code', '=', 'panneauxes.idclient')
            ->join('campagnes', 'campagnes.code', '=', 'panneauxes.idcampagne')
            ->join('coms', 'coms.id', '=', 'panneauxes.idcommune')
            ->join('regies', 'regies.code', '=', 'panneauxes.idregie')
            ->where('panneauxes.idclient','=',$client)
            ->where('panneauxes.idcampagne','=',$campagne)
            ->select(
                'panneauxes.idPanneaux as id',
                'panneauxes.emplacement as emplacement',
                'panneauxes.partdevoix as partdevoix',
                'panneauxes.latittude as latitude',
                'panneauxes.longitude',
                'panneauxes.image',
                'panneauxes.marqueur',
                'clients.Raison_Soc as client',
                'campagnes.libelle as campagne',
                'coms.name as commune',
                'regies.Raison_Soc as regie'
            )
            ->get();
        return $result;
    }

    public function allVisuelsAllCampagne($client, $commune)
    {
        $result = DB::table('panneauxes')
            ->join('clients', 'clients.code', '=', 'panneauxes.idclient')
            ->join('campagnes', 'campagnes.code', '=', 'panneauxes.idcampagne')
            ->join('coms', 'coms.id', '=', 'panneauxes.idcommune')
            ->join('regies', 'regies.code', '=', 'panneauxes.idregie')
            ->where('panneauxes.idclient', '=', $client)
            ->where('panneauxes.idcommune', '=', $commune)
            ->select(
                'panneauxes.idPanneaux as id',
                'panneauxes.emplacement as emplacement',
                'panneauxes.partdevoix as partdevoix',
                'panneauxes.latittude as latitude',
                'panneauxes.longitude',
                'panneauxes.image',
                'panneauxes.marqueur',
                'clients.Raison_Soc as client',
                'campagnes.libelle as campagne',
                'coms.name as commune',
                'regies.Raison_Soc as regie'
            )
            ->get();
        return $result;
    }


    public function allVisuelsNoClient( $campagne, $commune)
    {
        $result = DB::table('panneauxes')
            ->join('clients', 'clients.code', '=', 'panneauxes.idclient')
            ->join('campagnes', 'campagnes.code', '=', 'panneauxes.idcampagne')
            ->join('coms', 'coms.id', '=', 'panneauxes.idcommune')
            ->join('regies', 'regies.code', '=', 'panneauxes.idregie')
            ->where('panneauxes.idcampagne','=',$campagne)
            ->where('panneauxes.idcommune','=',$commune)
            ->select(
                'panneauxes.idPanneaux as id',
                'panneauxes.emplacement as emplacement',
                'panneauxes.partdevoix as partdevoix',
                'panneauxes.latittude as latitude',
                'panneauxes.longitude',
                'panneauxes.image',
                'panneauxes.marqueur',
                'clients.Raison_Soc as client',
                'campagnes.libelle as campagne',
                'coms.name as commune',
                'regies.Raison_Soc as regie'
            )
            ->get();
        return $result;
    }

    public function allVisuelsNoClientAllCommunes( $campagne)
    {
        $result = DB::table('panneauxes')
            ->join('clients', 'clients.code', '=', 'panneauxes.idclient')
            ->join('campagnes', 'campagnes.code', '=', 'panneauxes.idcampagne')
            ->join('coms', 'coms.id', '=', 'panneauxes.idcommune')
            ->join('regies', 'regies.code', '=', 'panneauxes.idregie')
            ->where('panneauxes.idcampagne','=',$campagne)
            ->select(
                'panneauxes.idPanneaux as id',
                'panneauxes.emplacement as emplacement',
                'panneauxes.partdevoix as partdevoix',
                'panneauxes.latittude as latitude',
                'panneauxes.longitude',
                'panneauxes.image',
                'panneauxes.marqueur',
                'clients.Raison_Soc as client',
                'campagnes.libelle as campagne',
                'coms.name as commune',
                'regies.Raison_Soc as regie'
            )
            ->get();
        return $result;
    }

    public function allVisuelsAllNoClientCampagne($commune)
    {
        $result = DB::table('panneauxes')
            ->join('clients', 'clients.code', '=', 'panneauxes.idclient')
            ->join('campagnes', 'campagnes.code', '=', 'panneauxes.idcampagne')
            ->join('coms', 'coms.id', '=', 'panneauxes.idcommune')
            ->join('regies', 'regies.code', '=', 'panneauxes.idregie')
            ->where('panneauxes.idcommune', '=', $commune)
            ->select(
                'panneauxes.idPanneaux as id',
                'panneauxes.emplacement as emplacement',
                'panneauxes.partdevoix as partdevoix',
                'panneauxes.latittude as latitude',
                'panneauxes.longitude',
                'panneauxes.image',
                'panneauxes.marqueur',
                'clients.Raison_Soc as client',
                'campagnes.libelle as campagne',
                'coms.name as commune',
                'regies.Raison_Soc as regie'
            )
            ->get();
        return $result;
    }

    public function findVisuels($visuel)
    {
        $result = DB::table('panneauxes')
            ->join('clients', 'clients.code', '=', 'panneauxes.idclient')
            ->join('campagnes', 'campagnes.code', '=', 'panneauxes.idcampagne')
            ->join('coms', 'coms.id', '=', 'panneauxes.idcommune')
            ->join('regies', 'regies.code', '=', 'panneauxes.idregie')
            ->where('panneauxes.idPanneaux','=',$visuel)
            ->select(
                'panneauxes.idPanneaux as id',
                'panneauxes.emplacement as emplacement',
                'panneauxes.partdevoix as partdevoix',
                'panneauxes.latittude as latitude',
                'panneauxes.longitude',
                'panneauxes.image',
                'panneauxes.marqueur',
                'clients.Raison_Soc as client',
                'campagnes.libelle as campagne',
                'coms.id as idcommune',
                'coms.name as commune',
                'regies.Raison_Soc as regie'
            )
            ->get();
        return $result;
    }

    public function findByClientVisuels($visuel, $client)
    {
        $result = DB::table('panneauxes')
            ->join('clients', 'clients.code', '=', 'panneauxes.idclient')
            ->join('campagnes', 'campagnes.code', '=', 'panneauxes.idcampagne')
            ->join('coms', 'coms.id', '=', 'panneauxes.idcommune')
            ->join('regies', 'regies.code', '=', 'panneauxes.idregie')
            ->where('panneauxes.idPanneaux','=',$visuel)
            ->where('panneauxes.idclient','=',$client)
            ->select(
                'panneauxes.idPanneaux as id',
                'panneauxes.emplacement as emplacement',
                'panneauxes.partdevoix as partdevoix',
                'panneauxes.latittude as latitude',
                'panneauxes.longitude',
                'panneauxes.image',
                'panneauxes.marqueur',
                'clients.Raison_Soc as client',
                'campagnes.libelle as campagne',
                'coms.id as idcommune',
                'coms.name as commune',
                'regies.Raison_Soc as regie'
            )
            ->get();
        return $result;
    }
}
