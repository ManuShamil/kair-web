<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    function department() {
        return $this -> belongsTo('App\Models\Department');
    }

    function titles() {
        return $this -> hasMany('App\Models\TreatmentInfo');
    }

    function descriptions() {
        return $this -> hasMany('App\Models\TreatmentDescription');
    }

}
