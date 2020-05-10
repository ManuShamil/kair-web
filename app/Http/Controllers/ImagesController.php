<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DepartmentImage;

class ImagesController extends Controller
{
    
    function getDepartmentImages($image) {

        $id = explode(".", $image)[0];

        
        $image = DepartmentImage::where('id', '1')->get();

        if (count($image) <= 0)
            return;
        

        $image = $image[0] -> image;

        header('Content-Type: image/png');
        echo $image;
    }
}
