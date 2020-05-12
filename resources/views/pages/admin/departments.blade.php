@extends('layouts.admin')

@section('title', $pageTitle)


@section('content')
    @component('components.breadnav', ['paths' =>  $paths, 'pageTitle' => $pageTitle ]) @endcomponent
    @component('components.departments') @endcomponent
    @component('components.footer') @endcomponent
@stop
