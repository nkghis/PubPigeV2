<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Campagne extends Model
{
    protected $table = 'campagnes';
    protected $primaryKey = 'code';
    public $incrementing = false;

    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
    ];

    public function listCampagne()
    {
        $result = DB::table('campagnes')
            ->join('clients', 'clients.code', '=', 'campagnes.Code_Client')
            ->join('produits', 'produits.code', '=', 'campagnes.Code_Produit')
            ->join('marques', 'marques.code', '=', 'campagnes.Code_Marque')
            ->select('campagnes.code as code','campagnes.libelle as libelle', 'campagnes.DP_Campagne as dp', 'campagnes.FP_Campagne as fp', 'campagnes.Code_Pays as pays', 'campagnes.Etat_Campagne as etat', 'campagnes.Duree_Camp as duree', 'clients.Raison_Soc as client', 'produits.libelle as produit', 'marques.libelle as marque')
            ->get();
        return $result;
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function marque()
    {
        return $this->belongsTo('App\Marque');
    }

    public function produit()
    {
        return $this->belongsTo('App\Produit');
    }

    public function visuels()
    {
        return $this->hasMany('App\Visuel');
    }

    public function getDebutAttribute()
    {
        return $this->attributes['DP_Campagne'];
    }


}
