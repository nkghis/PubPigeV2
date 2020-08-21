<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regie extends Model
{
    protected $table = 'regies';
    protected $primaryKey = 'code';
    //public $incrementing = false;


    public function visuels()
    {
        return $this->hasMany('App\Visuel');
    }
}
