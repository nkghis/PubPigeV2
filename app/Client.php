<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
    protected $primaryKey = 'code';
    public $incrementing = false;

    protected $fillable = [
        'Raison_Soc'
    ];



    public function users()
    {
        return $this->belongsToMany(User::class,'userclients');
    }
}
