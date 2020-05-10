<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Classes\Path;

class PagesController extends Controller
{
    public function index() {
        return view('pages.home');
    }

    public function why() {

        $paths= array(
            new Path('Why KairHealth?', '/why')
        );

        return view('pages.why')->with(['paths' => $paths, 'pageTitle' => "Why KairHealth?"]);
    }

    public function how() {

        $paths= array(
            new Path('How it Works?', '/how')
        );

        return view('pages.how')->with(['paths' => $paths, 'pageTitle' => "How it Works?"]);
    }

    public function treatments() {

        $paths= array(
            new Path('Treatments', '/treatments')
        );

        return view('pages.departments')->with(['paths' => $paths, 'pageTitle' => "Treatments Offered"]);
    }
}
