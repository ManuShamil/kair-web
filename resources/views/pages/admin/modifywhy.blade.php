@extends('layouts.app')

@section('title', $pageTitle)

<?php

    if ($mode == 'edit') {
        $action = "/admin/why/".$why->id;
    } else {
        $action = "/admin/why";
    }
?>

@section('content')
    @component('components.navbar') @endcomponent
    @component('components.admin.form')
        <h1> {{ $pageTitle }} </h1>



            @if ($mode == 'add')
            <form method="POST" action="{{$action}}" enctype="multipart/form-data">
                @csrf
                <label for="info">
                    <input name="info" type="text" placeholder="Title">
                </label>
                <label for="description">
                    <input name="description" type="text" placeholder="Description">
                </label>
                <label for="image">
                    <input name="image" type="file" placeholder="Upload Image">
                </label>

                <div class="button-wrapper">
                    <input type="submit" placeholder="Submit">
                </div>
            </form>
            @elseif ($mode == 'edit')
            <form method="POST" action="{{$action}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $why -> id }}">
                <img style="height: 100px;" src="/images/{{ $why -> image_id }}">
                
                <label for="info">
                    <input value="{{$why->info->first()->info??''}}" name="info" type="text" placeholder="Title">
                </label>
                <label for="description">
                    <input value="{{$why->info->first()->description??''}}" name="description" type="text" placeholder="Description">
                </label>
                <label for="image">
                    <input name="image" type="file" placeholder="Upload Image">
                </label>

                <div class="button-wrapper">
                    <input type="submit" placeholder="Submit">
                </div>
            </form>
            <form method="POST" action="{{$action}}" enctype="multipart/form-data">
                @method('DELETE')
                @csrf
                <input type="hidden" name="id" value="{{ $why -> id }}">
                <div class="button-wrapper">
                    <input style="background-color: #f00;"type="submit" value="Delete">
                </div>
            </form>
            @endif
    @endcomponent
@stop
