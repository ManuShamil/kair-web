<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DepartmentImage;
use App\Models\Why;

class ImagesController extends Controller
{
    
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
}
