<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        return view('pages.home');
    }

    public function why() {
        return view('pages.why');
    }
}
