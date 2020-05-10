@extends('layouts.app')

@section('title', 'Treatments Offered')


@section('content')
    @component('components.breadnav', ['paths' =>  $paths, 'pageTitle' => $pageTitle ]) @endcomponent
    @component('components.departments') @endcomponent
    @component('components.footer') @endcomponent
@stop
