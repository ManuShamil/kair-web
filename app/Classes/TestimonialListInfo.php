<?php

namespace App\Classes;

class TestimonialListInfo {
    public $testimonialID;
    public $name;
    public $location;
    public $image;
    public $quote;
    public function __construct($testimonial) {
        $this->testimonialID= $testimonial->id;
        $this->name= $testimonial->info->where('language','en')->first()->name;
        $this->location= $testimonial->info->where('language','en')->first()->location;
        $this->image="/images/".$testimonial->image_id;
        $this->quote= $testimonial->info->where('language','en')->first()->testimonial;
    }
}