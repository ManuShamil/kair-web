<?php

namespace App\Models\Hospital;

use Illuminate\Database\Eloquent\Model;

class HospitalInfo extends Model
{
    protected $table = "hospital_info";

    public function hospital() {
        return $this->belongsTo('App\Models\Hospital\Hospital');
    }
}
