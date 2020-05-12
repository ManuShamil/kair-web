@extends('layouts.app')

@section('title', 'How it Works?')


@section('content')
    @component('components.navbar') @endcomponent
    @component('components.breadnav', ['paths' =>  $paths, 'pageTitle' => $pageTitle ]) @endcomponent
    @component('components.how') @endcomponent
    @component('components.calltoaction') @endcomponent
    @component('components.footer') @endcomponent
@stop
