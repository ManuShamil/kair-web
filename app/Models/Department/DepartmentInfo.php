<?php

namespace App\Models\Department;

use Illuminate\Database\Eloquent\Model;

class DepartmentInfo extends Model
{
    protected $table = "department_info";
    public function department() {
        return $this -> belongsTo('App\Models\Department\Department');
    }

    public function scopeEn($query) {
        return $query -> where('language', 'en');
    }
}
