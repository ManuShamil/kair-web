<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Classes\Path;

use App\Models\Treatment\Treatment;
use App\Models\Department\Department;

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

    public function contact() {

        $errors = [];

        $paths= array(
            new Path('Contact', '/contact')
        );

        return view('pages.contact')->with([
            'paths' => $paths, 
            'pageTitle' => "Contact Us", 
            'errors'=> $errors,
            'name' => '',
            'email' => '',
            'number' => '',
            'message' => '',
            'success' => false
        ]);
    }

    public function postMessage(Request $request) {
        $name = $request->name;
        $email = $request->email;
        $number = $request->number;
        $message = $request->message;

        $errors = [];

        $paths= array(
            new Path('Contact', '/contact')
        );

        $isOK = true;

        switch (true) {
            case $name == '': array_push($errors, 'name'); $isOK = false;
            case $email == '': array_push($errors, 'email'); $isOK = false;
            case $number == '': array_push($errors, 'number'); $isOK = false;
            case $message == '': array_push($errors, 'message'); $isOK = false;
        }

        if ($isOK == false) {
            $paths= array(
                new Path('Error', ''),
                new Path('Contact', '/contact')
            );

            return view('pages.contact')->with(['paths' => $paths, 'pageTitle' => "Could not submit your message",
                'errors' => $errors,
                'name' => $name,
                'email' => $email,
                'number' => $number,
                'message' => $message,
                'success' => false
            ]);
        } else {

            $paths= array(
                new Path('Success', ''),
                new Path('Contact', '/contact')
            );

            return view('pages.contact')->with(['paths' => $paths, 'pageTitle' => "Success!",
                'errors' => [],
                'name' => $name,
                'email' => $email,
                'number' => $number,
                'message' => $message,
                'success' => true
            ]);
        }
    }

    public function loadDepartments() {

        $departments = Department::all();

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
        $department = Department::where('department_id',$department_name)->first();


        $department_name = $department ->info->where('language','en')->first()->full_name;
        
        $paths= array(
            new Path( $department_name , '/'),
            new Path( 'Departments' , '/departments/')
        );


        return view('pages.treatments')->with([
            'paths' => $paths, 
            'pageTitle' => $department_name,
            'department' => $department
        ]);
    }

    public function getTreatment($treatment_id) {


        $treatment = Treatment::where('treatment_id',$treatment_id)->first();
        
        $department = $treatment->department;

        $paths= array(
            new Path(
                $treatment -> info -> where('language','en')->first()->full_name, 
                ''
            ),new Path(
                $department->info->where('language','en')->first()->full_name,
                "/department/". $department -> department_id
            )
        );

        return view('pages.treatment')->with([
            'paths' => $paths, 
            'pageTitle' => $treatment -> info -> where('language','en')->first()->full_name,
            'treatment' => $treatment
        ]);
    }
}
