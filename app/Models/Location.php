<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = "locations";

    public function hospitals() {
        return $this->hasMany('App\Models\Hospital\Hospital');
    }
}
