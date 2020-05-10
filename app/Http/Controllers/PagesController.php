<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Classes\Path;

use App\Models\Treatment;
use App\Models\Department;

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

    public function loadDepartments() {

        $departments = App\Models\Department::all();

        $paths= array(
            new Path('Departments', '/departments')
        );

        return view('pages.departments')->with([
            'paths' => $paths, 
            'pageTitle' => "Departments Offered",
            'departments' => $departments
        ]);
    }

    public function getTreatments($department_name) {
        $department = Department::where('dept_id', $department_name)->get()->first();


        $department_name = $department -> info[0] -> full_name;
        
        $paths= array(
            new Path( $department_name , '/')
        );


        return view('pages.treatments')->with([
            'paths' => $paths, 
            'pageTitle' => $department_name,
            'department' => $department
        ]);
    }

    public function getTreatment($department_name, $treatment_id) {

        $paths= array(
            new Path('Cardiogy', '/')
        );

        $treatment = Treatment::where('id',$treatment_id);

        return view('pages.treatment')->with([
            'paths' => $paths, 
            'pageTitle' => "Treatments Offered",
            'treatment' => $treatment
        ]);
    }
}
