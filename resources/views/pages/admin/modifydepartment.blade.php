@extends('layouts.app')

@section('title', $pageTitle)

<?php
    use App\Models\Image;

    if ($mode == 'edit') {

        $department_id = $department -> department_id;
        $department_en = $department -> info -> where('language', 'en')->first -> full_name -> full_name;
        $department_ar = $department -> info -> where('language', 'ar')->first -> full_name -> full_name;
    }
?>

@section('content')
    @component('components.admin.form')
        <h1> {{ $pageTitle }} </h1>


        <form method="POST" action="/admin/department" enctype="multipart/form-data">
            @csrf

            @if ($mode == 'add')

                <label for="department_id">
                    <input name="department_id" type="text" placeholder="Enter lowercase department ID, no spaces.">
                </label>
                <label for="en_name">
                    <input name="en_name" type="text" placeholder="Department Name (EN)">
                </label>
                <label for="ar_name">
                    <input name="ar_name" type="text" placeholder="Department Name (AR)">
                </label>
                <label for="image">
                    <input name="image" type="file" placeholder="Upload Image">
                </label>

                <div class="button-wrapper">
                    <input type="submit" placeholder="Submit">
                </div>

            @elseif ($mode == 'edit')
                @method('PUT')
                <input type="hidden" name="id" value="{{ $department -> id }}">
                <img style="height: 100px;" src="/images/{{ $department -> image_id }}">
                
                <label for="department_id">
                    <input value="{{$department_id}}" name="department_id" type="text" placeholder="Enter lowercase department ID, no spaces.">
                </label>
                <label for="en_name">
                    <input value="{{$department_en}}" name="en_name" type="text" placeholder="Department Name (EN)">
                </label>
                <label for="ar_name">
                    <input value="{{$department_ar}}" name="ar_name" type="text" placeholder="Department Name (AR)">
                </label>
                <label for="image">
                    <input name="image" type="file" placeholder="Upload Image">
                </label>

                <div class="button-wrapper">
                    <input type="submit" placeholder="Submit">
                </div>
            @endif
        </form>
    @endcomponent
@stop
