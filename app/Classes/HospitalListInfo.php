<?php

namespace App\Classes;

class HospitalListInfo {
    public $id;
    public $name;
    public $image;
    public $location;
    public $page;
    public $truncatedDesc;
    public function __construct($hospital) {
        $this->id= $hospital->id;
        $this->name=$hospital->info->where('language','en')->first()->title;
        $this->image= "/images/" . $hospital->images->first()->image_id;
        $this->location= $hospital->location->en_location;
        $this->page= "/hospital/" . $hospital->id;
        $this->truncatedDesc = substr($hospital->infrastructures->where('language','en')->first()->infrastructure,0,150);
    }
}