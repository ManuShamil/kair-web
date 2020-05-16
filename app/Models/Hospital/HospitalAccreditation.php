<?php

namespace App\Models\Hospital;

use Illuminate\Database\Eloquent\Model;

class HospitalAccreditation extends Model
{
    protected $table="hospital_accreditations";

    public function accreditation() {
        return $this->belongsTo('App\Models\Accreditation');
    }
}
