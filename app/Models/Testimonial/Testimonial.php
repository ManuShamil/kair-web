<?php

namespace App\Models\Testimonial;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = "testimonials";

    public function info() {
        return $this->hasMany('App\Models\Testimonial\TestimonialInfo');
    }
}
