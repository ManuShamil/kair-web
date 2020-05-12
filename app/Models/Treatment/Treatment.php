<?php

namespace App\Models\Treatment;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $table = 'treatments';

    public function department() {
        return $this -> belongsTo('App\Models\Department\Department');
    }

    public function info() {
        return $this->hasMany('App\Models\Treatment\TreatmentInfo');
    }

    public function descriptions() {
        return $this->hasMany('App\Models\Treatment\TreatmentDescription');
    }
}
