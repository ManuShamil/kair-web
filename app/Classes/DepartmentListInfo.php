<?php

namespace App\Classes;

class DepartmentListInfo {
    public $departmentName;
    public $departmentID;
    public $image;
    public $page;
    public $adminPage;
    public function __construct($department) {
        $this->departmentName=$department->info->where('language','en')->first()->full_name;
        $this->departmentID=$department->department_id;
        $this->image="/images/".$department->image_id;
        $this->page="/department/".$department->department_id;
        $this->adminPage="/admin/department/". $department->id ."/edit";
    }
}