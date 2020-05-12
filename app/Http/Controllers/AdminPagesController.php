<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department\Department;
use App\Models\Department\DepartmentInfo;
use App\Models\Image;
use App\Classes\Path;

class AdminPagesController extends Controller
{
    
    public function departments() {

        $departments = Department::all();

        
        $paths= array(
            new path(
                'Modify Departments',
                ''
            ),
            new Path(
                'Admin', 
                ''
            )
        );

        return view('pages.admin.departments')->with([
            'departments' => $departments,
            'paths' => $paths,
            'pageTitle' => 'Admin'
        ]);
    }

    public function addDepartment() {
        $paths= array(
            new path(
                'Add Department',
                ''
            ),
            new Path(
                'Admin', 
                ''
            )
        );

        return view('pages.admin.modifydepartment')->with([
            'paths' => $paths,
            'pageTitle' => 'Add Department',
            'mode' => 'add'
        ]);
    }

    public function editDepartment($department_id) {

        $department = Department::find($department_id);
        $department_name = $department-> info[0] -> full_name;

        $paths= array(
            new path(
                'Edit Department',
                ''
            ),
            new Path(
                'Admin', 
                ''
            )
        );

        return view('pages.admin.modifydepartment')->with([
            'paths' => $paths,
            'pageTitle' => 'Editing ' . $department_name,
            'mode' => 'edit',
            'department' => $department
        ]);
    }

    public function postDepartment(Request $request) {

        $name = $request -> department_id;
        $en_name = $request -> en_name;
        $ar_name = $request -> ar_name;
        $image = $request -> image;

        $file = $request->file('image');
        $extension = $request -> image -> extension();
        $newImage = new Image();
        $newImage -> file_name = sha1(time()) . "." . $extension;
        $newImage -> extension = $extension;
        $newImage -> image = file_get_contents($file -> getRealPath());
        $newImage -> save();

        $newDepartment = new Department();
        $newDepartment -> department_id = $name;
        $newDepartment -> image_id = $newImage -> id;
        $newDepartment -> save();

        
        $newInfo_EN = new DepartmentInfo();
        $newInfo_EN -> language = "en";
        $newInfo_EN -> full_name = $en_name;
        $newInfo_EN -> department_id = $newDepartment -> id;
        $newInfo_EN -> save();

        $newInfo_AR = new DepartmentInfo();
        $newInfo_AR -> language = "ar";
        $newInfo_AR -> full_name = $ar_name;
        $newInfo_AR -> department_id = $newDepartment -> id;
        $newInfo_AR -> save();
        

        return redirect('/admin/departments');
    }

    public function updateDepartment(Request $request) {
        $id = $request -> id;
        $name = $request -> department_id;
        $en_name = $request -> en_name;
        $ar_name = $request -> ar_name;
        $image = $request -> image;


        $department = Department::find($id);

        if ($request -> hasFile('image')) {

            $file = $request->file('image');
            $extension = $request -> image -> extension();

            Image::where('id', $department -> image_id) -> update([
                "image" => file_get_contents($file -> getRealPath()),
                "extension" => $extension,
                "file_name" => sha1(time()) . "." . $extension
            ]);
        }

        Department::where('id', $id) -> update([
            "department_id" => $name
        ]);

        DepartmentInfo::where('department_id', $name)->where('language','en') -> update([
            "full_name" => $en_name
        ]);

        DepartmentInfo::where('department_id', $name)->where('language','ar') -> update([
            "full_name" => $ar_name
        ]);

        return redirect('/admin/departments');
    }
}
