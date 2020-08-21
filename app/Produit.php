<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produit extends Model
{
    protected $table = 'produits';
    protected $primaryKey = 'code';
    public $incrementing = false;


    public function listProduitMarque()
    {
        $result = DB::table('produits')
            ->join('marques', 'marques.code', '=', 'produits.Code_Marque')
            ->select('produits.code as code','produits.libelle as libelle', 'marques.libelle as marque')
            ->get();
        return $result;
    }

    public function campagnes()
    {
        return $this->hasMany('App\Campagne');
    }
}
