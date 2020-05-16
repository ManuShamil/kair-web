<?php

namespace App\Classes;

class HospitalDepartmentInfo {
    public $name;
    public $page;

    public function __construct($department){
        $this->name=$department->info->where('language','en')->first()->full_name;
        $this->page="/department/".$department->department_id;
    }
}

class HospitalAccreditationInfo {
    public $name;
    public $image;

    public function __construct($accreditation) {
        $this->name=$accreditation->title;
        $this->image="/images/".$accreditation->image_id;
    }
}

class HospitalInfrastructureInfo {
    public $infrastructure;

    public function __construct($infrastructure) {
        $this->infrastructure=$infrastructure->infrastructure;
    }
}

class HospitalAboutInfo {
    public $about;

    public function __construct($about) {
        $this->about=$about->about;
    }
}

class HospitalSpecialityInfo {
    public $speciality;

    public function __construct($speciality) {
        $this->speciality=$speciality->speciality;
    }
}

class HospitalInfo {
    public $id;
    public $name;
    public $beds;
    public $image;
    public $location;
    public $address;
    public $landmark;
    public $page;
    public $departments = [];
    public $infrastructures = [];
    public $accreditations = [];
    public $about = [];
    public $specialities = [];
    public function __construct($hospital) {
        $this->id= $hospital->id;
        $this->name=$hospital->info->where('language','en')->first()->title;
        $this->beds=$hospital->beds;
        $this->image= "/images/" . $hospital->images->first()->image_id;
        $this->location= $hospital->location->en_location;
        $this->address=$hospital->address->where('language','en')->first()->address;
        $this->landmark=$hospital->address->where('language','en')->first()->landmark;

        $this->page= "/hospital/" . $hospital->id;

        foreach($hospital->departments as $department) {
            array_push($this->departments,new HospitalDepartmentInfo($department->department));
        }

        foreach($hospital->infrastructures->where('language','en') as $infrastructure) {
            array_push($this->infrastructures,new HospitalInfrastructureInfo($infrastructure));
        }

        foreach($hospital->about->where('language','en') as $about) {
            array_push($this->about,new HospitalAboutInfo($about));
        }

        foreach($hospital->specialities->where('language','en') as $speciality) {
            array_push($this->specialities,new HospitalSpecialityInfo($speciality));
        }


        foreach($hospital->accreditations as $accreditation) {
            array_push($this->accreditations, new HospitalAccreditationInfo($accreditation->accreditation));
        }
    }
}