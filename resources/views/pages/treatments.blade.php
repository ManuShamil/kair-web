@extends('layouts.app')

@section('title', 'Treatments')

@section('content')
    @component('components.navbar') @endcomponent
    @component('components.breadnav', ['paths' =>  $paths, 'pageTitle' => $pageTitle ]) @endcomponent
    @component('components.treatments', ['department' => $department]) @endcomponent
    @component('components.footer') @endcomponent
@stop
