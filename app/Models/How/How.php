<?php

namespace App\Models\How;

use Illuminate\Database\Eloquent\Model;

class How extends Model
{
    protected $table = "hows";

    public function info(){
        return $this->hasMany('App\Models\How\HowInfo');
    }
}
