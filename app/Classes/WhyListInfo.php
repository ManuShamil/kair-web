<?php

namespace App\Classes;

class WhyListInfo {
    public $whyID;
    public $image;
    public $info;
    public $description;
    public function __construct($why) {
        $this->whyID=$why->id;
        $this->image="/images/".$why->image_id;
        $this->info= $why->info->where('language','en')->first()->info;
        $this->description= $why->info->where('language','en')->first()->description;
    }
}