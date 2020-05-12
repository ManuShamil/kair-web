@extends('layouts.app')

@section('title', 'Departments Offered')


@section('content')
    @component('components.navbar') @endcomponent
    @component('components.breadnav', ['paths' =>  $paths, 'pageTitle' => $pageTitle ]) @endcomponent
    @component('components.departments', ['departments' => $departments]) @endcomponent
    @component('components.footer') @endcomponent
@stop
