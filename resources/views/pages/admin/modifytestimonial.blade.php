@extends('layouts.app')

@section('title', $pageTitle)

<?php

    if ($mode == 'edit') {
        $action = "/admin/testimonial/".$testimonial->id;
    } else {
        $action = "/admin/testimonial";
    }
?>

@section('content')
    @component('components.navbar') @endcomponent
    @component('components.admin.form')
        <h1> {{ $pageTitle }} </h1>



            @if ($mode == 'add')
            <form method="POST" action="{{$action}}" enctype="multipart/form-data">
                @csrf
                <label for="name">
                    <input name="name" type="text" placeholder="Name">
                </label>
                <label for="location">
                    <input name="location" type="text" placeholder="Location">
                </label>
                <label for="testimonial">
                    <textarea name="testimonial" type="text" placeholder="Testimonial"></textarea>
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
                <input type="hidden" name="id" value="{{ $testimonial -> id }}">
                <img style="height: 100px;" src="/images/{{ $testimonial -> image_id }}">
                
                <label for="name">
                    <input value="{{$testimonial->info->first()->name??''}}" name="name" type="text" placeholder="Name">
                </label>
                <label for="location">
                    <input value="{{$testimonial->info->first()->location??''}}" name="location" type="text" placeholder="Location">
                </label>
                <label for="testimonial">
                <textarea name="testimonial" type="text" placeholder="Testimonial">{{$testimonial->info->first()->testimonial}}</textarea>
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
                <input type="hidden" name="id" value="{{ $testimonial -> id }}">
                <div class="button-wrapper">
                    <input style="background-color: #f00;"type="submit" value="Delete">
                </div>
            </form>
            @endif
    @endcomponent
@stop
