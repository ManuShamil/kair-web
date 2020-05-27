@extends('layouts.app')

@section('title', $pageTitle)

<?php
    use App\Models\Image;

    class HospitalEditInfo {
        public $hospitalID;
        public $hospitalNameEN;
        public $hospitalNameAR;
        public $locationID;
        public $addressEN = "";
        public $addressAR = "";
        public $landmarkEN = "";
        public $landmarkAR = "";
        public $accreditation = [];
        public $departments = [];
        public $infrastructuresEN = [];
        public $infrastructuresAR = [];
        public $aboutEN = [];
        public $aboutAR = [];
        public $specialitiesEN = [];
        public $specialitiesAR = [];
        public $image = "/images/0";

        public function __construct($hospital) {
            $this->hospitalID = $hospital->id;
            $this->hospitalNameEN = $hospital->info->where('language','en')->first()->title;
            $this->hospitalNameAR = $hospital->info->where('language','ar')->first()->title;
            $this->locationID = $hospital->location_id;
            
            $en_address = $hospital->address->where('language','en');
            if($en_address->count() > 0){
                $this->addressEN = $en_address->first()->address;
            }        


            $ar_address = $hospital->address->where('language','ar');
            if($ar_address->count() > 0){
                $this->addressAR = $ar_address->first()->address;
            }

            $en_landmark = $hospital->address->where('language','ar');
            if($en_landmark->count() > 0){
                $this->landmarkEN = $en_landmark->first()->land_mark;
            }

            $ar_landmark = $hospital->address->where('language','ar');
            if($ar_landmark->count() > 0){
                $this->landmarkAR = $ar_landmark->first()->land_mark;
            }
            
            $this->accreditations = $hospital->accreditations;
            $this->departments = $hospital->departments;

            foreach($hospital->infrastructures->where('language','ar') as $d) {
                array_push($this->infrastructuresAR, $d);
            }

            foreach($hospital->infrastructures->where('language','en') as $d) {
                array_push($this->infrastructuresEN, $d);
            }


            foreach($hospital->about->where('language','en') as $d) {
                array_push($this->aboutEN, $d);
            }

            foreach($hospital->about->where('language','ar') as $d) {
                array_push($this->aboutAR, $d);
            }

            foreach($hospital->specialities->where('language','en') as $d) {
                array_push($this->specialitiesEN, $d);
            }

            foreach($hospital->specialities->where('language','ar') as $d) {
                array_push($this->specialitiesAR, $d);
            }

            $this->image = "/images/" . $hospital->images->first()->image_id;
        }

    }
    
    $locations = App\Models\Location::all();
    $accreditations = App\Models\Accreditation::all();
    $departments = App\Models\Department\Department::all();

    if ($mode == 'edit') {
        $action = "/admin/hospital/".$hospital->id;

        $hospitalinfo = new HospitalEditInfo($hospital);
    } else if ($mode =='add') {
        $action = "/admin/hospital/";
    }
?>

@section('content')
    @component('components.admin.form')
        <h1> {{ $pageTitle }} </h1>


        <form method="POST" action="{{$action}}" enctype="multipart/form-data">
            @csrf

            @if ($mode == 'add')
                <label for="en_name">
                    <input name="en_name" type="text" placeholder="Hospital Name (EN)">
                </label>
                <label for="ar_name">
                    <input name="ar_name" type="text" placeholder="Hospital Name (AR)">
                </label>
                <label for="beds">
                    <input name="beds" type="text" placeholder="Hospital Beds">
                </label>
                <label style="width:100%;" for="location">
                    <select style="width:100%;" name="location" value="0">
                        <option value="0">Choose a Location</option>
                        @foreach($locations as $location)
                        <option value="{{$location->id}}">{{$location->en_location}}</option>
                        @endforeach
                    </select>
                </label>
                <label for="image">
                    <input name="image" type="file" placeholder="Upload Image">
                </label>

                <div class="button-wrapper">
                    <input type="submit" placeholder="Submit">
                </div>
            @elseif ($mode == 'edit')
                <img style="height: 100px;" src="{{ $hospitalinfo -> image }}">
                @method('PUT')         
                <label for="en_name">
                    <input value="{{$hospitalinfo->hospitalNameEN}}" name="en_name" type="text" placeholder="Hospital Name (EN)">
                </label>
                <label for="ar_name">
                    <input value="{{$hospitalinfo->hospitalNameAR}}" name="ar_name" type="text" placeholder="Hospital Name (AR)">
                </label>
                <label style="width:100%;display:flex;" for="location">
                    <select id="location_select" style="width:100%;" name="location" onchange="changeLocationEdit()">
                        <option value="0">Choose a Location</option>
                        @foreach($locations as $location)
                        <option value="{{$location->id}}"@if($location->id == $hospitalinfo->locationID) selected @endif>{{$location->en_location}}</option>
                        @endforeach
                    </select>
                    <div class="edit-wrapper" style="height: fit-content;">
                        <div class="edit-icon">
                            <a href="" id="location_edit" target="_blank"></a>
                        </div>
                    </div>
                    <a href="/admin/location/add">Can't find location in the list? Add your own location here..</a>
                </label>

                <div style="display: flex;">
                    <label for="en_address" style="flex: 0 0 50%;">
                        <input value="{{$hospitalinfo->addressEN}}" name="en_address" type="text" placeholder="Hospital Address (EN)">
                    </label>
                    <label for="ar_address" style="flex: 0 0 50%;">
                        <input value="{{$hospitalinfo->addressAR}}" name="ar_address" type="text" placeholder="Hospital Address (AR)">
                    </label>
                </div>

                <div style="display: flex;">
                    <label for="en_landmark" style="flex: 0 0 50%;">
                        <input value="{{$hospitalinfo->landmarkEN}}" name="en_landmark" type="text" placeholder="Hospital LandMark (EN)">
                    </label>
                    <label for="ar_landmark" style="flex: 0 0 50%;">
                        <input value="{{$hospitalinfo->landmarkAR}}" name="ar_landmark" type="text" placeholder="Hospital LandMark (AR)">
                    </label>
                </div>

                <label for="accreditations[]">
                    <div style="display: flex;">
                        @foreach($hospitalinfo->accreditations as $accreditation)
                        <div style="display: flex;">
                            <input type="hidden" value="{{$accreditation->accreditation->id}}" name="accreditations[]" readonly>
                            <input type="text" value="{{$accreditation->accreditation->title}}" readonly>
                            <div class="admin-add remove-tag" style="position: inherit;">
                                <a>-</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div style="display:flex;">
                        <select id="chosen_accr" style="width: 100%;" onchange="changeAccreditationEdit()">
                            <option value="0">Choose Accreditation</option>
                            @foreach($accreditations as $accr)
                            <option value="{{$accr->id}}">{{$accr->title}}</option>
                            @endforeach
                        </select>
                        
                        <div style="position: inherit;" id="addaccr" class="admin-add">
                            <a>+</a>
                        </div>
                        <div class="edit-wrapper" style="height: fit-content;">
                            <div class="edit-icon">
                                <a id="accreditation_edit" href="" target="_blank"></a>
                            </div>
                        </div>
                        <a href="/admin/accreditation/add">Can't find accreditation in the list? Add your own accreditation here..</a>
                    </div>
                </label>
                <label for="departments[]">
                    <div style="display: flex;">
                    @foreach ($hospitalinfo->departments as $dept)
                        <div style="display: flex;">
                            <input type="hidden" value="{{$dept->department->id}}" name="departments[]" readonly>
                            <input type="text" value="{{$dept->department->info[0]->full_name}}" readonly>
                            <div class="admin-add remove-tag" style="position: inherit;">
                                <a>-</a>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    <div style="display:flex;">
                        <select id="chosen_dept" style="width: 100%;">
                            <option value="0">Choose Departments</option>
                            @foreach($departments as $dept)
                            <option value="{{$dept->id}}">{{$dept->info[0]->full_name}}</option>
                            @endforeach
                        </select>
                        
                        <div style="position: inherit;" id="adddept" class="admin-add">
                            <a>+</a>
                        </div>
                    </div>
                </label>

                <h2>Infrastructure</h2>
                <div id="infras">
                    @for ($i=0; $i< count($hospitalinfo->infrastructuresEN); $i++)
                        <div style="display:flex;">
                            <label for="en_infrastructure[]" style="flex: 0 0 40%;">
                                <textarea name="en_infrastructure[]" type="text" placeholder="Hospital Infrastructure (EN)">{{$hospitalinfo->infrastructuresEN[$i]->infrastructure}}</textarea>
                            </label>
                            <label for="ar_infrastructure[]" style="flex: 0 0 40%;">
                                <textarea name="ar_infrastructure[]" type="text" placeholder="Hospital Infrastructure (AR)">{{$hospitalinfo->infrastructuresAR[$i]->infrastructure}}</textarea>
                            </label>
                            <div style="position: inherit;" class="admin-add addinfra">
                                <a>+</a>
                            </div>
                            @if ($i!=0)
                            <div style="position: inherit;" class="admin-add remove-infra">
                                <a>-</a>
                            </div>
                            @endif
                        </div>
                    @endfor
                    @if (count($hospitalinfo->infrastructuresEN) <=0)
                    <div style="display:flex;">
                        <label for="en_infrastructure[]" style="flex: 0 0 40%;">
                            <textarea name="en_infrastructure[]" type="text" placeholder="Hospital Infrastructure (EN)"></textarea>
                        </label>
                        <label for="ar_infrastructure[]" style="flex: 0 0 40%;">
                            <textarea name="ar_infrastructure[]" type="text" placeholder="Hospital Infrastructure (AR)"></textarea>
                        </label>
                        <div style="position: inherit;" class="admin-add addinfra">
                            <a>+</a>
                        </div>
                        <!--<div style="position: inherit;" id="adddept" class="admin-add">
                            <a>-</a>
                        </div>-->
                    </div>
                    @endif
                </div>

                <h2>About</h2>
                <div id="abouts">
                @for ($i=0; $i< count($hospitalinfo->aboutEN); $i++)
                        <div style="display:flex;">
                            <label for="en_about[]" style="flex: 0 0 40%;">
                                <textarea name="en_about[]" type="text" placeholder="Hospital About (EN)">{{$hospitalinfo->aboutEN[$i]->about}}</textarea>
                            </label>
                            <label for="ar_about[]" style="flex: 0 0 40%;">
                                <textarea name="ar_about[]" type="text" placeholder="Hospital About (AR)">{{$hospitalinfo->aboutAR[$i]->about}}</textarea>
                            </label>
                            <div style="position: inherit;" class="admin-add add-about">
                                <a>+</a>
                            </div>
                            @if ($i!=0)
                            <div style="position: inherit;" class="admin-add remove-about">
                                <a>-</a>
                            </div>
                            @endif
                        </div>
                    @endfor
                    @if (count($hospitalinfo->aboutEN) <=0)
                    <div style="display:flex;">
                        <label for="en_about[]" style="flex: 0 0 40%;">
                            <textarea name="en_about[]" type="text" placeholder="Hospital About (EN)"></textarea>
                        </label>
                        <label for="ar_about[]" style="flex: 0 0 40%;">
                            <textarea name="ar_about[]" type="text" placeholder="Hospital About (AR)"></textarea>
                        </label>
                        <div style="position: inherit;" class="admin-add add-about">
                            <a>+</a>
                        </div>
                        <!--<div style="position: inherit;" id="adddept" class="admin-add">
                            <a>-</a>
                        </div>-->
                    </div>
                    @endif
                </div>

                <h2>Specialities</h2>
                <div id="specialities">
                    @for ($i=0; $i< count($hospitalinfo->specialitiesEN); $i++)
                        <div style="display:flex;">
                            <label for="en_specialities[]" style="flex: 0 0 40%;">
                                <textarea name="en_specialities[]" type="text" placeholder="Hospital Speciality (EN)">{{$hospitalinfo->specialitiesEN[$i]->speciality}}</textarea>
                            </label>
                            <label for="ar_specialities[]" style="flex: 0 0 40%;">
                                <textarea name="ar_specialities[]" type="text" placeholder="Hospital Speciality (AR)">{{$hospitalinfo->specialitiesAR[$i]->speciality}}</textarea>
                            </label>
                            <div style="position: inherit;" class="admin-add add-speciality">
                                <a>+</a>
                            </div>
                            @if ($i!=0)
                            <div style="position: inherit;" class="admin-add remove-speciality">
                                <a>-</a>
                            </div>
                            @endif
                        </div>
                    @endfor
                    @if (count($hospitalinfo->specialitiesEN) <=0)
                    <div style="display:flex;">
                        <label for="en_specialities[]" style="flex: 0 0 40%;">
                            <textarea name="en_specialities[]" type="text" placeholder="Hospital Speciality (EN)"></textarea>
                        </label>
                        <label for="ar_specialities[]" style="flex: 0 0 40%;">
                            <textarea name="ar_specialities[]" type="text" placeholder="Hospital Speciality (AR)"></textarea>
                        </label>
                        <div style="position: inherit;" class="admin-add add-speciality">
                            <a>+</a>
                        </div>
                        <!--<div style="position: inherit;" id="adddept" class="admin-add">
                            <a>-</a>
                        </div>-->
                    </div>
                    @endif
                </div>

                <label for="image">
                    <input name="image" type="file" placeholder="Upload Image">
                </label>

                <div class="button-wrapper">
                    <input type="submit" placeholder="Submit">
                </div>
            @endif
        </form>
    @endcomponent

    <script>
        function changeLocationEdit() {
            $('#location_edit').attr('href',`/admin/location/${$('#location_select').val()}/edit`)
        }

        function changeAccreditationEdit() {
            $('#accreditation_edit').attr('href',`/admin/accreditation/${$('#chosen_accr').val()}/edit`)
        }
    </script>
@stop

