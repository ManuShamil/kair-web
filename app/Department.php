<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function images() {
        return $this -> hasMany('App\DepartmentImage');
    }
}
