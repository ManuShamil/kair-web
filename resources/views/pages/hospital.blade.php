@extends('layouts.app')

@section('title', $pageTitle)


@section('content')
    @component('components.navbar') @endcomponent
    @component('components.breadnav', ['paths' =>  $paths, 'pageTitle' => $pageTitle ]) @endcomponent
    @component('components.hospital', ['hospital' => $hospital]) @endcomponent
    @component('components.footer') @endcomponent
@stop
