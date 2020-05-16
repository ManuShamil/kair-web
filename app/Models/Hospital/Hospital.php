<?php

namespace App\Models\Hospital;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $table = "hospitals";

    public function location() {
        return $this->belongsTo('App\Models\Location');
    }

    public function info() {
        return $this->hasMany('App\Models\Hospital\HospitalInfo');
    }

    public function about() {
        return $this->hasMany('App\Models\Hospital\HospitalAbout');
    }

    public function accreditations() {
        return $this->hasMany('App\Models\Hospital\HospitalAccreditation');
    }

    public function address() {
        return $this->hasMany('App\Models\Hospital\HospitalAddress');
    }

    public function images() {
        return $this->hasMany('App\Models\Hospital\HospitalImage');
    }

    public function specialities() {
        return $this->hasMany('App\Models\Hospital\HospitalSpeciality');
    }

    public function departments() {
        return $this->hasMany('App\Models\Hospital\HospitalDepartment');
    }

    public function infrastructures() {
        return $this->hasMany('App\Models\Hospital\HospitalInfrastructure');
    }
}
