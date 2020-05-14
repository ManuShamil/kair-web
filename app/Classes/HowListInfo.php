<?php

namespace App\Classes;

class HowListInfo {
    public $howID;
    public $image;
    public $info;
    public $description;
    public function __construct($how) {
        $this->howID=$how->id;
        $this->image="/images/".$how->image_id;
        $this->info= $how->info->where('language','en')->first()->info;
        $this->description= $how->info->where('language','en')->first()->description;
    }
}