<?php

namespace App\Classes;

class TreatmentDescriptionInfo {
    public $priortiy;
    public $language;
    public $question;
    public $answer;

    public function __construct($description) {
        $this->priotiy=$description->priority;
        $this->language=$description->language;
        $this->question=$description->question;
        $this->answer=$description->answer;
    }
}

class TreatmentPageInfo {
        public $image;
        public $treatmentName;
        public $departmentName;
        public $descriptions = [];
        public function __construct($treatment) {
            $this->treatmentName =$treatment->info->where('language','en')->first()->full_name;
            $this->departmentName=$treatment->department->info->where('language','en')->first()->full_name;
            $this->image="/images/".$treatment->image_id;
            
            $descriptions = $treatment->descriptions->where('language','en');

            foreach ($descriptions as $description) {
                array_push($this->descriptions, new TreatmentDescriptionInfo($description));
            }
        }
    }