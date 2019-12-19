<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserClient extends Model
{

    protected $table = 'userclients';


    public function listUserClient()
    {
        $result = DB::table('userclients')
            ->join('users', 'users.id', '=', 'userclients.user_id')
            ->join('clients', 'clients.code', '=', 'userclients.client_id')
            ->select('userclients.id as id','users.id as user_id', 'clients.code as client_id', 'users.name', 'users.email', 'clients.Raison_Soc')
            ->get();
        return $result;
    }
}
