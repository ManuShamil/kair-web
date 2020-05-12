@extends('layouts.app')

@section('title', $pageTitle)


@section('content')
    @component('components.navbar') @endcomponent

    @component('components.breadnav', ['paths' =>  $paths, 'pageTitle' => $pageTitle ]) @endcomponent

    @component('components.contact', [
        'errors' => $errors, 
        'name' => $name, 
        'number' => $number, 
        'email' => $email, 
        'message' => $message,
        'success' => $success
    ]) 
    @endcomponent

    @component('components.footer') @endcomponent
@stop
