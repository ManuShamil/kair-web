<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Why extends Model
{
    protected $table = 'why';

    function infos() {
        return $this -> hasMany('App\Models\WhyInfo');
    }
}
