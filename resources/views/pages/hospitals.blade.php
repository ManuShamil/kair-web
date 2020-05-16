@extends('layouts.app')

@section('title', 'Hospitals Offered')


@section('content')
    @component('components.navbar') @endcomponent
    @component('components.breadnav', ['paths' =>  $paths, 'pageTitle' => $pageTitle ]) @endcomponent
    @component('components.hospitals') @endcomponent
    @component('components.footer') @endcomponent
@stop
