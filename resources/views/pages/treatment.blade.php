@extends('layouts.app')

@section('title', 'Treatments')


@section('content')
    @component('components.breadnav', ['paths' =>  $paths, 'pageTitle' => $pageTitle ]) @endcomponent
    @component('components.treatment', ['treatment' => $treatment]) @endcomponent
    @component('components.footer') @endcomponent
@stop
