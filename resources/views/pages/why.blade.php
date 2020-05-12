@extends('layouts.app')

@section('title', 'Why KairHealth?')


@section('content')
    @component('components.navbar') @endcomponent
    @component('components.breadnav', ['paths' =>  $paths, 'pageTitle' => $pageTitle ]) @endcomponent
    @component('components.why') @endcomponent
    @component('components.calltoaction') @endcomponent
    @component('components.footer') @endcomponent
@stop
