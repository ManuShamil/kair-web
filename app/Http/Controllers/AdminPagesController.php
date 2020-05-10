<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPagesController extends Controller
{
    
    public function departments() {
        return view('pages.admin.departments');
    }
}
