@extends('layouts.app')

@section('title', $pageTitle)

<?php
    use App\Models\Image;
?>

@section('content')]
    @component('components.navbar') @endcomponent
    @component('components.admin.form')
        <h1> {{ $pageTitle }} </h1>

        <form method="POST" action="/admin/login" enctype="multipart/form-data">
            @csrf
            <label for="username">
                <input name="username" type="text" placeholder="Username">
            </label>

            <label for="password">
                <input name="password" type="password" placeholder="Password">
            </label>

            <div class="button-wrapper">
                <input type="submit" placeholder="Submit">
            </div>
        </form>
    @endcomponent
@stop
