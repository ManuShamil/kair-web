<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestimonialInfo extends Model
{

    protected $table = "testimonials_info";

    public function testimonial() {
        
        return $this -> belongsTo('App\Models\Testimonial');
    }
}
