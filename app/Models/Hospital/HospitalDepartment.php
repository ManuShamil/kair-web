<?php

namespace App\Models\Hospital;

use Illuminate\Database\Eloquent\Model;

class HospitalDepartment extends Model
{
    protected $table = "hospital_departments";

    public function department() {
        return $this -> belongsTo('App\Models\Department\Department');
    }
}
