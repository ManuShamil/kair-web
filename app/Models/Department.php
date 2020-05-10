<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function images() {
        return $this -> hasMany('App\Models\DepartmentImage');
    }

    public function info() {
        return $this -> hasMany('App\Models\DepartmentInfo');
    }

    public function treatments() {
        return $this -> hasMany('App\Models\Treatment');
    }
}
