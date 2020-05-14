@extends('layouts.app')

@section('title', $pageTitle)

<?php
    use App\Models\Image;


    if ($mode == 'edit') {
        $treatment_id = $treatment -> id;
        $treatment_en = $treatment -> info -> where('language', 'en')->first -> full_name -> full_name;
        $treatment_ar = $treatment -> info -> where('language', 'ar')->first -> full_name -> full_name;
        $descriptions = $treatment->descriptions;

        $descriptionDataEN = [];
        $descriptionDataAR = [];
        for ($i=0; $i< $descriptions->where('language','en')->count(); $i++) {
            $en = $treatment->descriptions->where('priority', $i)->where('language','en')->first();
            $ar = $treatment->descriptions->where('priority', $i)->where('language','ar')->first();

            array_push($descriptionDataEN, $en);
            array_push($descriptionDataAR, $ar);
            
        }
        
        $department = $treatment -> department;

        $action = "/admin/treatment/" . $treatment_id;
    } else if ($mode =='add') {
        $action = "/admin/".$department -> id ."/treatment";
    }
?>

@section('content')
    @component('components.admin.form')
        <h1> {{ $pageTitle }} </h1>


        <form method="POST" action="{{$action}}" enctype="multipart/form-data">
            @csrf

            @if ($mode == 'add')
                <label for="department_id">
                    <input name="department_id" value="{{$department->id}}" type="hidden">
                </label>
                <label for="department_name">
                    <input name="department_name" value="{{$department->department_id}}" type="text" placeholder="{{$department->department_id}}" readonly>
                </label>
                <label for="treatment_id">
                    <input name="treatment_id" type="text" placeholder="Enter lowercase Treatment ID, no spaces.">
                </label>
                <label for="en_name">
                    <input name="en_name" type="text" placeholder="Treatment Name (EN)">
                </label>
                <label for="ar_name">
                    <input name="ar_name" type="text" placeholder="Treatment Name (AR)">
                </label>
                <label for="image">
                    <input name="image" type="file" placeholder="Upload Image">
                </label>

                <div class="button-wrapper">
                    <input type="submit" placeholder="Submit">
                </div>
            @elseif ($mode == 'edit')
                @method('PUT')
                <img style="height: 100px;" src="/images/{{ $treatment -> image_id }}">
                <label for="department_id">
                    <input name="department_id" value="{{$department->id}}" type="hidden">
                </label>
                <label for="department_name">
                    <input name="department_name" value="{{$department->department_id}}" type="text" placeholder="{{$department->department_id}}" readonly>
                </label>
                <label for="treatment_name">
                    <input name="treatment_name" value="{{ $treatment -> treatment_id}}" type="text" placeholder="Enter lowercase Treatment ID, no spaces." readonly>
                </label>
                <label for="en_name">
                    <input name="en_name" value="{{ $treatment_en }}" type="text" placeholder="Treatment Name (EN)">
                </label>
                <label for="ar_name">
                    <input name="ar_name" value="{{ $treatment_ar }}" type="text" placeholder="Treatment Name (AR)">
                </label>
                <label for="image">
                    <input name="image" type="file" placeholder="Upload Image">
                </label>

                <div id="description_slot">
                    <h2>Descriptions:</h2>
                    @for($i=0; $i< count($descriptionDataEN); $i++)
                    <div style="text-align: left;" class="description">
                        <h2>Description </h2>
                        <label>
                            <input value="{{$descriptionDataEN[$i]->question}}" type="text" name="question[]" placeholder="Question in English">
                        </label>
                        <label for="answer[]">
                            <textarea type="text" name="answer[]" placeholder="Answer in English">{{$descriptionDataEN[$i]->answer}}</textarea>
                        </label>
                        <label for="question_ar[]">
                            <input value="{{$descriptionDataAR[$i]->question}}" type="text" name="question_ar[]" placeholder="Question in Arabic">
                        </label>
                        <label for="answer_ar[]">
                            <textarea type="text" name="answer_ar[]" placeholder="Answer in Arabic">{{$descriptionDataAR[$i]->answer}}</textarea>
                        </label>
                        @if($i>0)
                        <div class="admin-add remove-desc">
                            <a>-</a>
                        </div>
                        @endif
                        <div class="admin-add add-desc" style="right: 10%;">
                            <a>+</a>
                        </div>
                    </div>
                    @endfor
                </div>

                <div class="button-wrapper">
                    <input type="submit" placeholder="Submit">
                </div>
            @endif
        </form>
    @endcomponent
@stop