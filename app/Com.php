<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Com extends Model
{
    public $incrementing = false;

    public function visuels()
    {
        return $this->hasMany('App\Visuel');
    }
}
