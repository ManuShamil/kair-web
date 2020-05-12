<?php

namespace App\Classes;


class TreatmentListInfo {
    public $treatment_id;
    public $image;
    public $page;
    public $treatmentName;
    public $truncated_desc;

    public function __construct($treatment) {

        $this -> treatment_id = $treatment -> id;
        $this -> image = '/images/' . $treatment -> id;
        $this -> page = "/treatment/" . $treatment -> treatment_id;
        $this -> treatmentName = $treatment -> info->where('language','en')->first()->full_name;
        $this -> truncated_desc = substr($treatment->descriptions->where('language','en')->first()->answer,0,150);
    }
}