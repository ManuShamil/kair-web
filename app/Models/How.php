<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class How extends Model
{
    protected $table = "hows";

    function infos() {
        return $this -> hasMany('App\Models\HowInfo');
    }
}
