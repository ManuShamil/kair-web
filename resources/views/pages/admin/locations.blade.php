@extends('layouts.app')

@section('title', $pageTitle)

<?php
    use App\Models\Image;

    if ($mode == 'add') {
        $action = "/admin/location";
    } else {
        $action = "/admin/location/". $location -> id;
    }
?>

@section('content')
    @component('components.admin.form')
        <h1> {{ $pageTitle }} </h1>


        <form method="POST" action="{{$action}}" enctype="multipart/form-data">
            @csrf

            @if ($mode == 'add')
                <label for="en_name">
                    <input name="en_name" type="text" placeholder="Location Name (EN)">
                </label>
                <label for="ar_name">
                    <input name="ar_name" type="text" placeholder="Location Name (AR)">
                </label>

                <div class="button-wrapper">
                    <input type="submit" placeholder="Submit">
                </div>

            @elseif ($mode == 'edit')
                @method('PUT')
                <input type="hidden" name="id" value="{{ $location -> id }}">
                
                <label for="en_name">
                    <input value="{{$location->en_location}}" name="en_name" type="text" placeholder="Location Name (EN)">
                </label>
                <label for="ar_name">
                    <input value="{{$location->ar_location}}" name="ar_name" type="text" placeholder="Location Name (AR)">
                </label>

                <div class="button-wrapper">
                    <input type="submit" placeholder="Submit">
                </div>
            @endif
        </form>
    @endcomponent
@stop
