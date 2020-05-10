<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DepartmentImage;
use App\Models\Treatment;
use App\Models\Why;
use App\Models\How;
use App\Models\Testimonial;

class ImagesController extends Controller
{
    
    function getTreatmentImage($file_name) {

        $image = Treatment::where('file_name', $file_name)->get();

        if (count($image) <= 0)
            return;
        

        $obj = $image[0] -> image;
        $extension = $image[0] -> file_extension;

        header('Content-Type: image/png');

        echo $obj;
    }

    function getDepartmentImages($file_name) {

        $image = DepartmentImage::where('file_name', $file_name)->get();

        if (count($image) <= 0)
            return;
        

        $obj = $image[0] -> image;
        $extension = $image[0] -> file_extension;

        header('Content-Type: image/png');

        echo $obj;
    }

    function getWhyImages($file_name) {

        $image = Why::where('file_name', $file_name)->get();

        if (count($image) <= 0)
            return;

        $obj = $image[0] -> image;

        header('Content-Type: image/png');

        echo $obj;


    }

    function getHowImages($file_name) {

        $image = How::where('file_name', $file_name)->get();

        if (count($image) <= 0)
            return;

        $obj = $image[0] -> image;

        header('Content-Type: image/png');

        echo $obj;


    }

    function getTestimonialImages($file_name) {

        $image = Testimonial::where('file_name', $file_name)->get();

        if (count($image) <= 0)
            return;

        $obj = $image[0] -> image;

        header('Content-Type: image/png');

        echo $obj;


    }
}
