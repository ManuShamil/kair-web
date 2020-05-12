<?php

namespace App\Models\Department;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function image() {
        return $this -> hasMany('App\Models\Image');
    }

    public function info() {
        return $this -> hasMany('App\Models\Department\DepartmentInfo');
    }

    public function treatments() {
        return $this->hasMany('App\Models\Treatment\Treatment');
    }
}
