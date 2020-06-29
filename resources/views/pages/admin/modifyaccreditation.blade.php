@extends('layouts.app')

@section('title', $pageTitle)

<?php
    use App\Models\Image;

    if ($mode == 'edit') {
        $action = "/admin/accreditation/".$accreditation->id;
    } else {
        $action = "/admin/accreditation";
    }
?>

@section('content')
    @component('components.navbar') @endcomponent
    @component('components.admin.form')
        <h1> {{ $pageTitle }} </h1>


        <form method="POST" action="{{$action}}" enctype="multipart/form-data">
            @csrf

            @if ($mode == 'add')
                <label for="name">
                    <input name="name" type="text" placeholder="Accreditation">
                </label>
                <label for="image">
                    <input name="image" type="file" placeholder="Upload Image">
                </label>

                <div class="button-wrapper">
                    <input type="submit" placeholder="Submit">
                </div>

            @elseif ($mode == 'edit')
                @method('PUT')
                <input type="hidden" name="id" value="{{ $accreditation -> id }}">
                <img style="height: 100px;" src="/images/{{ $accreditation -> image_id }}">
                
                <label for="name">
                    <input value="{{$accreditation->title}}" name="name" type="text" placeholder="Accreditation">
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
