<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department\Department;
use App\Models\Department\DepartmentInfo;
use App\Models\Treatment\Treatment;
use App\Models\Treatment\TreatmentInfo;
use App\Models\Treatment\TreatmentDescription;
use App\Models\Hospital\Hospital;
use App\Models\Hospital\HospitalInfo;
use App\Models\Hospital\HospitalAddress;
use App\Models\Hospital\HospitalImage;
use App\Models\Hospital\HospitalAccreditation;
use App\Models\Hospital\HospitalInfrastructure;
use App\Models\Hospital\HospitalDepartment;
use App\Models\Hospital\HospitalAbout;
use App\Models\Hospital\HospitalSpeciality;
use App\Models\Location;
use App\Models\Image;
use App\Models\Accreditation;
use App\Models\How\How;
use App\Models\How\HowInfo;
use App\Models\Why\Why;
use App\Models\Why\WhyInfo;
use App\Models\Testimonial\Testimonial;
use App\Models\Testimonial\TestimonialInfo;


use App\Classes\Path;

class AdminPagesController extends Controller
{

    public function addHow() {
        $paths= array(
            new path(
                'Add How',
                ''
            ),
            new Path(
                'Admin', 
                ''
            )
        );

        return view('pages.admin.modifyhow')->with([
            'paths' => $paths,
            'pageTitle' => 'Add How',
            'mode' => 'add'
        ]);
    }

    public function postHow(Request $request) {
        $info = $request->info ?? '';
        $description = $request->description ?? '';

        if (!($request -> hasFile('image'))) {
            echo "No image specified";
            return;
        }

        $file = $request->file('image');
        $extension = $request -> image -> extension();
        $newImage = new Image();
        $newImage -> file_name = sha1(time()) . "." . $extension;
        $newImage -> extension = $extension;
        $newImage -> image = file_get_contents($file -> getRealPath());
        $newImage -> save();

        $newHow = new How();
        $newHow->image_id=$newImage->id;
        $newHow->save();

        $newHowInfo = new HowInfo();
        $newHowInfo->how_id = $newHow->id;
        $newHowInfo->info = $info;
        $newHowInfo->description = $description;
        $newHowInfo->language = "en";
        $newHowInfo->save();

        return redirect('/how');
    }

    public function updateHow(Request $request, $how_id) {
        $how = How::find($how_id);

        if ($request -> hasFile('image')) {

            $file = $request->file('image');
            $extension = $request -> image -> extension();

            Image::where('id', $how -> image_id) -> update([
                "image" => file_get_contents($file -> getRealPath()),
                "extension" => $extension,
                "file_name" => sha1(time()) . "." . $extension
            ]);
        }

        $info = $request->info ?? '';
        $description = $request->description ?? '';

        HowInfo::where('how_id', $how_id) -> update([
            "info" => $info,
            "description" => $description
        ]);

        return redirect('/admin/how/'.$how_id.'/edit');
    }

    public function deleteHow(Request $request, $how_id) {

        //delete related departmentinfo
        HowInfo::where('how_id',$how_id)->delete();
        How::where('id',$how_id)->delete();

        return redirect('/how');
    }

    public function editHow($how_id) {
        $how = How::find($how_id);
        $how_title = $how-> info[0] -> info;

        $paths= array(
            new path(
                'Edit How',
                ''
            ),
            new Path(
                'Admin', 
                ''
            )
        );

        return view('pages.admin.modifyhow')->with([
            'paths' => $paths,
            'pageTitle' => 'Editing ' . $how_title,
            'mode' => 'edit',
            'how' => $how
        ]);
    }

    public function addTestimonial() {
        $paths= array(
            new path(
                'Add Testimonial',
                ''
            ),
            new Path(
                'Admin', 
                ''
            )
        );

        return view('pages.admin.modifytestimonial')->with([
            'paths' => $paths,
            'pageTitle' => 'Add Testimonial',
            'mode' => 'add'
        ]);
    }

    public function addWhy() {
        $paths= array(
            new path(
                'Add Why',
                ''
            ),
            new Path(
                'Admin', 
                ''
            )
        );

        return view('pages.admin.modifywhy')->with([
            'paths' => $paths,
            'pageTitle' => 'Add Why',
            'mode' => 'add'
        ]);
    }

    public function postTestimonial(Request $request) {
        $name = $request->name ?? '';
        $location = $request->location ?? '';
        $testimonial = $request ->testimonial ?? '';

        
        if (!($request -> hasFile('image'))) {
            echo "No image specified";
            return;
        }

        $file = $request->file('image');
        $extension = $request -> image -> extension();
        $newImage = new Image();
        $newImage -> file_name = sha1(time()) . "." . $extension;
        $newImage -> extension = $extension;
        $newImage -> image = file_get_contents($file -> getRealPath());
        $newImage -> save();
        

        $newTestimonial = new Testimonial();
        $newTestimonial->image_id=$newImage->id;
        $newTestimonial->save();

        $newTestimonialInfo = new TestimonialInfo();
        $newTestimonialInfo->testimonial_id = $newTestimonial->id;
        $newTestimonialInfo->language = "en";
        $newTestimonialInfo->name = $name ?? '';
        $newTestimonialInfo->location = $location ?? '';
        $newTestimonialInfo->testimonial = $testimonial ?? '';
        $newTestimonialInfo->save();

        return redirect('/');
    }

    public function postWhy(Request $request) {
        $info = $request->info ?? '';
        $description = $request->description ?? '';

        if (!($request -> hasFile('image'))) {
            echo "No image specified";
            return;
        }

        $file = $request->file('image');
        $extension = $request -> image -> extension();
        $newImage = new Image();
        $newImage -> file_name = sha1(time()) . "." . $extension;
        $newImage -> extension = $extension;
        $newImage -> image = file_get_contents($file -> getRealPath());
        $newImage -> save();

        $newWhy = new Why();
        $newWhy->image_id=$newImage->id;
        $newWhy->save();

        $newWhyInfo = new WhyInfo();
        $newWhyInfo->why_id = $newWhy->id;
        $newWhyInfo->info = $info;
        $newWhyInfo->description = $description;
        $newWhyInfo->language = "en";
        $newWhyInfo->save();

        return redirect('/why');
    }

    
    public function updateTestimonial(Request $request, $testimonial_id) {
        $testimonial = Testimonial::find($testimonial_id);

        if ($request -> hasFile('image')) {

            $file = $request->file('image');
            $extension = $request -> image -> extension();

            Image::where('id', $testimonial -> image_id) -> update([
                "image" => file_get_contents($file -> getRealPath()),
                "extension" => $extension,
                "file_name" => sha1(time()) . "." . $extension
            ]);
        }

        $name = $request->name ?? '';
        $location = $request->location ?? '';
        $testimonial = $request->testimonial ?? '';

        TestimonialInfo::where('testimonial_id', $testimonial_id) -> update([
            "name" => $name,
            "location" => $location,
            "testimonial" => $testimonial
        ]);

        return redirect('/admin/testimonial/'.$testimonial_id.'/edit');
    }

    public function updateWhy(Request $request, $why_id) {
        $why = Why::find($why_id);

        if ($request -> hasFile('image')) {

            $file = $request->file('image');
            $extension = $request -> image -> extension();

            Image::where('id', $why -> image_id) -> update([
                "image" => file_get_contents($file -> getRealPath()),
                "extension" => $extension,
                "file_name" => sha1(time()) . "." . $extension
            ]);
        }

        $info = $request->info ?? '';
        $description = $request->description ?? '';

        WhyInfo::where('why_id', $why_id) -> update([
            "info" => $info,
            "description" => $description
        ]);

        return redirect('/admin/why/'.$why_id.'/edit');
    }

    public function deleteWhy(Request $request, $why_id) {

        //delete related departmentinfo
        WhyInfo::where('why_id',$why_id)->delete();
        Why::where('id',$why_id)->delete();

        return redirect('/why');
    }

    
    public function deleteTestimonial(Request $request, $testimonial_id) {

        //delete related departmentinfo
        TestimonialInfo::where('testimonial_id',$testimonial_id)->delete();
        Testimonial::where('id',$testimonial_id)->delete();

        return redirect('/');
    }


    public function editWhy($why_id) {
        $why = Why::find($why_id);
        $why_title = $why-> info[0] -> info;

        $paths= array(
            new path(
                'Edit Why',
                ''
            ),
            new Path(
                'Admin', 
                ''
            )
        );

        return view('pages.admin.modifywhy')->with([
            'paths' => $paths,
            'pageTitle' => 'Editing ' . $why_title,
            'mode' => 'edit',
            'why' => $why
        ]);
    }

    
    public function editTestimonial($testimonial_id) {
        $testimonial = Testimonial::find($testimonial_id);
        $testimonial_name = $testimonial-> info[0] -> name . "'s testimonial";

        $paths= array(
            new path(
                'Edit Testimonial',
                ''
            ),
            new Path(
                'Admin', 
                ''
            )
        );

        return view('pages.admin.modifytestimonial')->with([
            'paths' => $paths,
            'pageTitle' => 'Editing ' . $testimonial_name,
            'mode' => 'edit',
            'testimonial' => $testimonial
        ]);
    }

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

    public function addLocation() {
        $paths= array(
            new path(
                'Add Location',
                ''
            ),
            new Path(
                'Admin', 
                ''
            )
        );

        return view('pages.admin.locations')->with([
            'paths' => $paths,
            'pageTitle' => 'Add Location',
            'mode' => 'add'
        ]);
    }

    public function postLocation(Request $request) {
        $en_name = $request->en_name;
        $ar_name = $request->ar_name;

        $new_location = new Location();
        $new_location->en_location=$en_name;
        $new_location->ar_location=$ar_name;
        $new_location->save();

        return redirect('/admin/location/'.$new_location->id.'/edit');
    }

    public function editLocation($location_id) {
        $location = Location::find($location_id);

        $paths= array(
            new path(
                'Edit Location',
                ''
            ),
            new Path(
                'Admin', 
                ''
            )
        );

        return view('pages.admin.locations')->with([
            'paths' => $paths,
            'pageTitle' => 'Editing ' . $location->en_location,
            'mode' => 'edit',
            'location' => $location
        ]);
    }

    public function updateLocation(Request $request) {
        $en_location = $request->en_name;
        $ar_location = $request->ar_name;

        Location::where('id',$request->id)->update([
            "en_location" => $en_location,
            "ar_location" => $ar_location
        ]);

        return redirect('/admin/location/'.$request->id.'/edit');
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

    public function addAccreditation() {
        $paths= array(
            new path(
                'Add Accreditation',
                ''
            ),
            new Path(
                'Admin', 
                ''
            )
        );

        return view('pages.admin.modifyaccreditation')->with([
            'paths' => $paths,
            'pageTitle' => 'Add Accreditation',
            'mode' => 'add'
        ]);
    }

    public function postAccreditation(Request $request) {

        if (!($request -> hasFile('image'))) {
            echo "No image specified";
            return;
        }

        $file = $request->file('image');
        $extension = $request -> image -> extension();
        $newImage = new Image();
        $newImage -> file_name = sha1(time()) . "." . $extension;
        $newImage -> extension = $extension;
        $newImage -> image = file_get_contents($file -> getRealPath());
        $newImage -> save();

        $accreditation = new Accreditation();
        $accreditation->image_id=$newImage->id;
        $accreditation->title=$request->name;
        $accreditation->save();

        return redirect('/admin/accreditation/'.$accreditation->id.'/edit');
    }

    public function editAccreditation($accreditation_id) {
        $accreditation = Accreditation::find($accreditation_id);

        $paths= array(
            new path(
                'Edit Accreditation',
                ''
            ),
            new Path(
                'Admin', 
                ''
            )
        );

        return view('pages.admin.modifyaccreditation')->with([
            'paths' => $paths,
            'pageTitle' => 'Editing ' . $accreditation->title,
            'mode' => 'edit',
            'accreditation' => $accreditation
        ]);
    }

    public function updateAccreditation(Request $request) {
        $id = $request -> id;
        $name = $request -> name;
        $image = $request -> image;


        $accreditation = Accreditation::find($id);

        if ($request -> hasFile('image')) {

            $file = $request->file('image');
            $extension = $request -> image -> extension();

            Image::where('id', $accreditation -> image_id) -> update([
                "image" => file_get_contents($file -> getRealPath()),
                "extension" => $extension,
                "file_name" => sha1(time()) . "." . $extension
            ]);
        }

        Accreditation::where('id', $id) -> update([
            "title" => $name
        ]);

        return redirect('/admin/accreditation/'.$id.'/edit');

    }

    public function addHospital() {
        $paths= array(
            new path(
                'Add Hospital',
                ''
            ),
            new Path(
                'Admin', 
                ''
            )
        );

        return view('pages.admin.modifyhospital')->with([
            'paths' => $paths,
            'pageTitle' => 'Add Hospital',
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

        if (!($request -> hasFile('image'))) {
            echo "No image specified";
            return;
        }

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

        if (!($request -> hasFile('image'))) {
            echo "No image specified";
            return;
        }

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
        

        return redirect('/departments');
    }

    public function postHospital(Request $request) {
        $en_name = $request -> en_name;
        $ar_name = $request -> ar_name;
        $beds = $request->beds;
        $location_id = $request->location;
        $image = $request -> image;

        if (!($request -> hasFile('image'))) {
            echo "No image specified";
            return;
        }

        $file = $request->file('image');
        $extension = $request -> image -> extension();
        $newImage = new Image();
        $newImage -> file_name = sha1(time()) . "." . $extension;
        $newImage -> extension = $extension;
        $newImage -> image = file_get_contents($file -> getRealPath());
        $newImage -> save();

        $newHospital = new Hospital();
        $newHospital->location_id=$location_id;
        $newHospital->beds=$beds;
        $newHospital -> save();

        
        $hospitalImage = new HospitalImage();
        $hospitalImage->hospital_id=$newHospital->id;
        $hospitalImage->image_id=$newImage->id;
        $hospitalImage->save();
        
        $newInfo_EN = new HospitalInfo();
        $newInfo_EN -> language = "en";
        $newInfo_EN -> title = $en_name;
        $newInfo_EN->hospital_id=$newHospital->id;
        $newInfo_EN -> save();

        $newInfo_EN = new HospitalInfo();
        $newInfo_EN -> language = "ar";
        $newInfo_EN -> title = $ar_name;
        $newInfo_EN->hospital_id=$newHospital->id;
        $newInfo_EN -> save();

        return redirect('/admin/hospital/'.$newHospital->id.'/edit');
        
    }

    public function editHospital(Request $request, $hospital_id) {
        
        $hospital = Hospital::find($hospital_id);
        $hospital_name = $hospital-> info[0] -> title;

        $paths= array(
            new path(
                'Edit Hospital',
                ''
            ),
            new Path(
                'Admin', 
                ''
            )
        );

        return view('pages.admin.modifyHospital')->with([
            'paths' => $paths,
            'pageTitle' => 'Editing ' . $hospital_name,
            'mode' => 'edit',
            'hospital' => $hospital
        ]);
    }

    public function deleteHospital(Request $request, $hospital_id) {

        //delete related departmentinfo
        HospitalAbout::where('hospital_id',$hospital_id)->delete();
        HospitalAccreditation::where('hospital_id',$hospital_id)->delete();
        HospitalAddress::where('hospital_id',$hospital_id)->delete();
        HospitalDepartment::where('hospital_id',$hospital_id)->delete();
        HospitalImage::where('hospital_id',$hospital_id)->delete();
        HospitalInfo::where('hospital_id',$hospital_id)->delete();
        HospitalInfrastructure::where('hospital_id',$hospital_id)->delete();
        HospitalSpeciality::where('hospital_id',$hospital_id)->delete();
        Hospital::where('id',$hospital_id)->delete();

        return redirect('/hospitals/');
    }

    public function updateHospital(Request $request, $hospital_id) {
        $id = $request -> hospital_id;

        $hospital = Hospital::where('id', $id)->get()->first();

        $en_name = $request->en_name;
        $ar_name = $request->ar_name;

        HospitalInfo::where('hospital_id', $id)->where('language','en') -> update([
            "title" => $en_name
        ]);

        HospitalInfo::where('hospital_id', $id)->where('language','ar') -> update([
            "title" => $ar_name
        ]);

        $location_id = $request->location;

        Hospital::where('id',$id)->update(["location_id"=>$location_id]);

        $en_address = $request->en_address??'';
        $en_landmark = $request->en_landmark??'';
        $ar_address = $request->ar_address??'';
        $ar_landmark = $request->ar_landmark??'';

        HospitalAddress::where('hospital_id', $id)->delete();

        $newAddress = new HospitalAddress();
        $newAddress->hospital_id=$id;
        $newAddress->language="en";
        $newAddress->address=$en_address;
        $newAddress->land_mark=$en_landmark;
        $newAddress->save();

        $newAddress = new HospitalAddress();
        $newAddress->hospital_id=$id;
        $newAddress->language="ar";
        $newAddress->address=$ar_address;
        $newAddress->land_mark=$ar_landmark;
        $newAddress->save();

        $accreditations = $request->accreditations;
        HospitalAccreditation::where('hospital_id',$id)->delete();

        if ($accreditations != null)
            foreach($accreditations as $accreditation) {
                $newHosAccr = new HospitalAccreditation();
                $newHosAccr->hospital_id=$id;
                $newHosAccr->accreditation_id=$accreditation;
                $newHosAccr->save();
            }

        $departments = $request->departments;
        HospitalDepartment::where('hospital_id',$id)->delete();

        if ($departments != null)
            foreach($departments as $department) {
                $newHosDept = new HospitalDepartment();
                $newHosDept->hospital_id=$id;
                $newHosDept->department_id=$department;
                $newHosDept->save();
            }

        $en_infrastructures = $request->en_infrastructure;
        $ar_infrastructures = $request->ar_infrastructure;

        HospitalInfrastructure::where('hospital_id',$id)->delete();

        for ($i=0; $i<count($en_infrastructures); $i++) {
            $newInfraEN = new HospitalInfrastructure();
            $newInfraEN->hospital_id=$id;
            $newInfraEN->language="en";
            $newInfraEN->infrastructure= isset($en_infrastructures[$i]) ? $en_infrastructures[$i] : ""; 
            $newInfraEN->save();

            $newInfraAR = new HospitalInfrastructure();
            $newInfraAR->hospital_id=$id;
            $newInfraAR->language="ar";
            $newInfraAR->infrastructure= isset($ar_infrastructures[$i]) ? $ar_infrastructures[$i] : ""; 
            $newInfraAR->save();
        }

        $en_abouts = $request->en_about;
        $ar_abouts = $request->ar_about;

        HospitalAbout::where('hospital_id',$id)->delete();

        for ($i=0; $i<count($en_abouts); $i++) {
            $newAboutEN = new HospitalAbout();
            $newAboutEN->hospital_id=$id;
            $newAboutEN->language="en";
            $newAboutEN->about=isset($en_abouts[$i]) ? $en_abouts[$i] : ""; 
            $newAboutEN->save();

            $newAboutAR = new HospitalAbout();
            $newAboutAR->hospital_id=$id;
            $newAboutAR->language="ar";
            $newAboutAR->about=isset($ar_abouts[$i]) ? $ar_abouts[$i] : ""; 
            $newAboutAR->save();
        }

        $en_specialities = $request->en_specialities;
        $ar_specialities = $request->ar_specialities;

        HospitalSpeciality::where('hospital_id',$id)->delete();

        for ($i=0; $i<count($en_specialities); $i++) {
            $newSpecialityEN = new HospitalSpeciality();
            $newSpecialityEN->hospital_id=$id;
            $newSpecialityEN->language="en";
            $newSpecialityEN->speciality=isset($en_specialities[$i]) ? $en_specialities[$i] : ""; 
            $newSpecialityEN->save();

            $newSpecialityAR = new HospitalSpeciality();
            $newSpecialityAR->hospital_id=$id;
            $newSpecialityAR->language="ar";
            $newSpecialityAR->speciality=isset($ar_specialities[$i]) ? $ar_specialities[$i] : ""; 
            $newSpecialityAR->save();
        }


        if ($request -> hasFile('image')) {

            $file = $request->file('image');
            $extension = $request -> image -> extension();

            Image::where('id', $hospital->images[0]->image_id) -> update([
                "image" => file_get_contents($file -> getRealPath()),
                "extension" => $extension,
                "file_name" => sha1(time()) . "." . $extension
            ]);
        }


        return redirect('/admin/hospital/'.$id.'/edit');
    }

    public function deleteDepartment(Request $request) {
        $id = $request->id;

        //delete departments releated
        HospitalDepartment::where('department_id',$id)->delete();

        //delete related treatments
        $treatments =  Treatment::where('department_id',$id)->get()->pluck('id')->toArray();

        foreach($treatments as $treatment_id) {
            TreatmentInfo::where('treatment_id',$treatment_id)->delete();
            TreatmentDescription::where('treatment_id',$treatment_id)->delete();
            Treatment::where('id',$treatment_id)->delete();
        }



        //delete related departmentinfo
        DepartmentInfo::where('department_id',$id)->delete();
        Department::where('id',$id)->delete();

        return redirect('/departments');
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

    public function deleteTreatment(Request $request, $treatment_id) {
        $department_id = $request->department_id;

        //delete related departmentinfo
        TreatmentDescription::where('treatment_id',$treatment_id)->delete();
        TreatmentInfo::where('treatment_id',$treatment_id)->delete();
        Treatment::where('id',$treatment_id)->delete();

        return redirect('/department/'.Department::find($department_id)->department_id );
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

    function getLogin() {
        
        $paths= array(
            new Path('Contact', '/contact')
        );

        return view('pages.admin.login')->with([
            'paths' => $paths, 
            'pageTitle' => "Admin Login"
        ]);
    }

    function loginIn(Request $request) {

        if ($request->username == "admin" && $request->password=="1304") { 
            session(['isAdmin' => true]);
        
            return redirect('/');
        } else {
            session(['isAdmin' => false]);
            echo "Username or password is wrong!";
        }
        
    }

    function logOut() {
        session(['isAdmin' => false]);
        return redirect('/');
    }
}
