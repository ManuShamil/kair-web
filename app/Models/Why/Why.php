<?php

namespace App\Models\Why;

use Illuminate\Database\Eloquent\Model;

class Why extends Model
{
    protected $table = "why";

    public function info() {
        return $this->hasMany('App\Models\Why\WhyInfo');
    }
}
