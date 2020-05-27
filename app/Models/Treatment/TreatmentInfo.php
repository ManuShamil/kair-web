<?php

namespace App\Models\Treatment;

use Illuminate\Database\Eloquent\Model;

class TreatmentInfo extends Model
{
    protected $table = "treatment_info";

    public function treatment() {
        return $this->belongsTo('App\Models\Treatment\Treatment');
    }
}
