<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department\Department;
use App\Models\Department\DepartmentInfo;
use App\Models\Treatment\Treatment;
use App\Models\Treatment\TreatmentInfo;
use App\Models\Treatment\TreatmentDescription;
use App\Models\Image;
use App\Classes\Path;

class AdminPagesController extends Controller
{
    
    
    public function addTreatment($department_id) {

        $paths= array(
            new path(
                'Add Treatment',
                ''
            ),
            new Path(
                'Admin', 
                ''
            )
        );

        $department = Department::where('id', $department_id) -> first();

        return view('pages.admin.modifytreatment')->with([
            'paths' => $paths,
            'pageTitle' => 'Add Treatment',
            'mode' => 'add',
            'department' => $department
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

    public function postTreatment(Request $request) {
        $department_id = $request -> department_id;
        $department_name = $request -> department_name;
        $treatment_id = $request -> treatment_id;
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

        $newTreatment = new Treatment();
        $newTreatment -> treatment_id = $treatment_id;
        $newTreatment -> department_id = $department_id;
        $newTreatment -> image_id = $newImage -> id;
        $newTreatment -> save();

        
        $newInfo_EN = new TreatmentInfo();
        $newInfo_EN -> language = "en";
        $newInfo_EN -> full_name = $en_name;
        $newInfo_EN -> treatment_id = $newTreatment -> id;
        $newInfo_EN -> save();

        $newInfo_AR = new TreatmentInfo();
        $newInfo_AR -> language = "ar";
        $newInfo_AR -> full_name = $ar_name;
        $newInfo_AR -> treatment_id = $newTreatment -> id;
        $newInfo_AR -> save();
        

        return redirect('/department/'.$department_name);
    }

    public function editTreatment($treatment_id) {

        $treatment = Treatment::find($treatment_id);
        $treatment_name = $treatment-> info[0] -> full_name;

        $paths= array(
            new path(
                'Edit Treatment',
                ''
            ),
            new Path(
                'Admin', 
                ''
            )
        );

        return view('pages.admin.modifyTreatment')->with([
            'paths' => $paths,
            'pageTitle' => 'Editing ' . $treatment_name,
            'mode' => 'edit',
            'treatment' => $treatment
        ]);
    }

    /*public function departments() {

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
    }*/
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

        DepartmentInfo::where('department_id', $id)->where('language','en') -> update([
            "full_name" => $en_name
        ]);

        DepartmentInfo::where('department_id', $id)->where('language','ar') -> update([
            "full_name" => $ar_name
        ]);

        return redirect('/admin/department/'.$id.'/edit');
    }

    public function updateTreatment(Request $request, $treatment_id) {

        $department_id = $request -> department_id;
        $department_name = $request -> department_name;
        $treatment_name = $request -> treatment_name;
        $en_name = $request -> en_name;
        $ar_name = $request -> ar_name;
        $image = $request -> image;

        $description_qn_en = $request -> question;
        $description_an_en = $request -> answer;
        $description_qn_ar = $request -> question_ar;
        $description_an_ar = $request -> answer_ar;
        
        $questions = $request->question;

        $length = count($questions);

        TreatmentInfo::where('treatment_id',$treatment_id)->where('language', 'en')->update([
            'full_name' => $en_name
        ]);

        TreatmentInfo::where('treatment_id',$treatment_id)->where('language', 'ar')->update([
            'full_name' => $ar_name
        ]);

        $treatment = Treatment::find($treatment_id);

        if ($request -> hasFile('image')) {

            $file = $request->file('image');
            $extension = $request -> image -> extension();

            Image::where('id', $treatment -> image_id) -> update([
                "image" => file_get_contents($file -> getRealPath()),
                "extension" => $extension,
                "file_name" => sha1(time()) . "." . $extension
            ]);
        }

        //delete all existing descriptions
        TreatmentDescription::where('treatment_id', $treatment_id)->delete();

        for ($i=0; $i < $length; $i++) {
            $newTreatmentDesc = new TreatmentDescription();
            $newTreatmentDesc->treatment_id = $treatment_id;
            $newTreatmentDesc-> language = "en";
            $newTreatmentDesc->priority=$i;
            $newTreatmentDesc->question = $description_qn_en[$i];
            $newTreatmentDesc->answer = $description_an_en[$i];
            $newTreatmentDesc->save();

            $newTreatmentDescAR = new TreatmentDescription();
            $newTreatmentDescAR->treatment_id = $treatment_id;
            $newTreatmentDescAR-> language = "ar";
            $newTreatmentDescAR->priority=$i;
            $newTreatmentDescAR->question = $description_qn_ar[$i];
            $newTreatmentDescAR->answer = $description_an_ar[$i];
            $newTreatmentDescAR->save();

        }

        return redirect('/admin/treatment/'. $treatment_id .'/edit');

    }
}
