@extends('layouts.app')

@section('title', $pageTitle)


@section('content')
    @component('components.navbar') @endcomponent
    @component('components.breadnav', ['paths' =>  $paths, 'pageTitle' => $pageTitle ]) @endcomponent
    @component('components.treatment', ['treatment' => $treatment]) @endcomponent
    @component('components.footer') @endcomponent
@stop
