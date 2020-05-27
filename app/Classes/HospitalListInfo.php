<?php

namespace App\Classes;

use App\Classes\HospitalAccreditationInfo;

class HospitalListInfo {
    public $id;
    public $name;
    public $image;
    public $location;
    public $address;
    public $page;
    public $truncatedDesc;
    public $desc;
    public $beds = 0;
    public $abouts = [];
    public $specialities = [];
    public $accreditations = [];
    public function __construct($hospital) {
        $this->id= $hospital->id;
        $this->name=$hospital->info->where('language','en')->first()->title;
        $this->image= "/images/" . $hospital->images->first()->image_id;
        $this->location= $hospital->location->en_location;
        $this->address= $hospital->address->where('language', 'en')->first()->address;
        $this->page= "/hospital/" . $hospital->id;
        $this->truncatedDesc = substr($hospital->infrastructures->where('language','en')->first()->infrastructure,0,150);
        $this->desc = $hospital->infrastructures->where('language','en')->first()->infrastructure;
        $this->beds = $hospital->beds;

        $abouts = $hospital->about->where('language','en');
        foreach($abouts as $about) {
            array_push($this->abouts, $about->about);
        }

        $specialities = $hospital->specialities->where('language','en');
        foreach($specialities as $speciality) {
            array_push($this->specialities, $speciality->speciality);
        }

        foreach($hospital->accreditations as $accreditation) {
            array_push($this->accreditations, new HospitalAccreditationInfo($accreditation->accreditation));
        }


    }
}