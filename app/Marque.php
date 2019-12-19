<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Marque extends Model
{
    protected $table = 'marques';
    protected $primaryKey = 'code';
    public $incrementing = false;

    public function listMarqueClient()
    {
        $result = DB::table('marques')
            ->join('clients', 'clients.code', '=', 'marques.Code_Client')
            ->select('marques.code as code','marques.libelle as libelle', 'clients.Raison_Soc as client')
            ->get();
        return $result;
    }
}
