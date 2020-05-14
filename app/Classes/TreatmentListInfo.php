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
        $this -> image = '/images/' . $treatment -> image_id;
        $this -> page = "/treatment/" . $treatment -> treatment_id;
        $this -> treatmentName = $treatment -> info->where('language','en')->first()->full_name;

        $description = $treatment->descriptions->where('language','en')->first();

        if ($description != null)
            $this -> truncated_desc = substr($treatment->descriptions->where('language','en')->first()->answer,0,150);
        else
            $this -> truncated_desc = "No Description";
    }
}